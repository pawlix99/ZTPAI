<?php


namespace App\Controller;


use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/user/{id}", name="user", methods={"GET"})
     * @param int $id
     * @param UsersRepository $userRepository
     * @return JsonResponse
     */
    public function findUserData(int $id, UsersRepository $userRepository): JsonResponse
    {
        $user = $userRepository->findUser($id);

        return $this->json($user);
    }
}