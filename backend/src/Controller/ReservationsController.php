<?php


namespace App\Controller;

use App\Entity\Reservations;
use App\Repository\ReservationsRepository;
use App\Repository\RoomsRepository;
use App\Repository\UsersRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReservationsController extends AbstractController
{
    /**
     * @Route("/reservation", name="reservation", methods={"POST"})
     * @param Request $request
     * @param UsersRepository $usersRepository
     * @param RoomsRepository $roomsRepository
     * @return JsonResponse
     * @throws \Exception
     */
     public function makeReservation(Request $request, UsersRepository $usersRepository, RoomsRepository $roomsRepository): JsonResponse
     {
         $postData = json_decode($request->getContent());

         $user = $usersRepository->findUser($postData->idUser);
         $room = $roomsRepository->findRoom($postData->idRoom);
         $reservation = new Reservations;
         $reservation->setIdUser($user[0]);
         $reservation->setSinceWhen(new DateTime($postData->sinceWhen));
         $reservation->setUntilWhen(new DateTime($postData->untilWhen));
         $reservation->setIdRoom($room[0]);
         $reservation->setReservationDate(new DateTime($postData->reservationDate));
         $em = $this->getDoctrine()->getManager();
         $em->persist($reservation);
         $em->flush();
         return $this->json("Reservation created");
    }

    /**
     * @Route("/reservations/{id}", name="userReservations", methods={"GET"})
     * @param int $id
     * @param ReservationsRepository $reservationsRepository
     * @return JsonResponse
     */
    public function getUserReservations(int $id, ReservationsRepository $reservationsRepository): JsonResponse
    {
        $reservations = $reservationsRepository->findUserReservations($id);
        $userReservations = [];
        $j = 0;
        for ($i=0; $i<count($reservations); $i=$i+3){
            $userReservations[$j]['name'] = $reservations[$i+2]->name;
            $userReservations[$j]['address'] = $reservations[$i+2]->address;
            $userReservations[$j]['image'] = $reservations[$i+2]->image;
            $userReservations[$j]['numberOfPeople'] = $reservations[$i+1]->numberOfPeople;
            $userReservations[$j]['price'] = $reservations[$i+1]->price;
            $sinceWhen = new DateTime($reservations[$i]->sinceWhen->format('Y-m-d'));
            $untilWhen = new DateTime($reservations[$i]->untilWhen->format('Y-m-d'));
            $userReservations[$j]['sinceWhen'] = $sinceWhen->format('Y-m-d');
            $userReservations[$j]['untilWhen'] = $untilWhen->format('Y-m-d');
            $j++;
        }

        return $this->json($userReservations);
    }
}