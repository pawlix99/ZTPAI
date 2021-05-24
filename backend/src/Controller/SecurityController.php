<?php

// src/Controller/SecurityController.php
namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Firebase\JWT\JWT;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/auth/register", name="register", methods={"POST"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $postData = json_decode($request->getContent());


        $name = $postData->name;
        $surname = $postData->surname;
        $phone = $postData->phone;
        $address = $postData->address;
        $password = $postData->password;
        $email = $postData->email;
        $user = new Users();
        $user->setPassword($encoder->encodePassword($user, $password));
        $user->setEmail($email);
        $user->setName($name);
        $user->setSurname($surname);
        $user->setPhone($phone);
        $user->setAddress($address);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->json([
            'user' => $user->getEmail()
        ]);
    }


    /**
     * @Route("/auth/login", name="login", methods={"POST"})
     * @param Request $request
     * @param UsersRepository $userRepository
     * @param UserPasswordEncoderInterface $encoder
     * @return JsonResponse
     */
    public function login(Request $request, UsersRepository $userRepository, UserPasswordEncoderInterface $encoder): JsonResponse
    {
        $postData = json_decode($request->getContent());

        $user = $userRepository->findOneBy([
            'email'=>$postData->email,
        ]);
        if (!$user) {
            return $this->json([
                'message' => 'email is wrong.',
            ]);
        }
        if (!$encoder->isPasswordValid($user, $postData->password)) {
            return $this->json([
                'message' => 'password is wrong.',
            ]);
        }


        $payload = [
            "user" => $user->getUsername(),
            "exp"  => (new \DateTime())->modify("+5 minutes")->getTimestamp(),
        ];


        $jwt = JWT::encode($payload, $this->getParameter('jwt_secret'), 'HS256');
        return $this->json([
            'message' => 'success!',
            'token' => sprintf('Bearer %s', $jwt),
            'user' => $user->getIdUser()
        ]);
    }
}