<?php


namespace App\Controller;


use App\Entity\Rooms;
use App\Repository\AccommodationsRepository;
use App\Repository\RoomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RoomsController extends AbstractController
{
    /**
     * @Route("/accommodation/{id}/rooms/free/{begin}/{end}", name="freeRooms")
     * @param int $id
     * @param string $begin
     * @param string $end
     * @param RoomsRepository $roomsRepository
     * @return JsonResponse
     */
    public function freeRooms(int $id, string $begin, string $end, RoomsRepository $roomsRepository): JsonResponse
    {
        $rooms = $roomsRepository->findAvailableRooms($id, $begin, $end);
        return $this->json($rooms);
    }

    /**
     * @Route("/accommodation/{id}/rooms/all", name="allRooms", methods={"GET"})
     * @param int $id
     * @param RoomsRepository $roomsRepository
     * @return JsonResponse
     */
    public function allRooms(int $id, RoomsRepository $roomsRepository): JsonResponse
    {
        $rooms = $roomsRepository->findAllRooms($id);
        return $this->json($rooms);
    }

    /**
     * @Route("/{place}/{begin}/{end}", name="freeAccommodations", methods={"GET"})
     * @param string $place
     * @param string $begin
     * @param string $end
     * @param RoomsRepository $roomsRepository
     * @param AccommodationsRepository $accommodationsRepository
     * @return JsonResponse
     */
    public function freeAccommodations(string $place, string $begin, string $end, RoomsRepository $roomsRepository, AccommodationsRepository $accommodationsRepository): JsonResponse
    {
        $accommodations = $accommodationsRepository->findAccommodationsByPlace($place);
        $freeAccommodations = [];
        foreach ($accommodations as $accommodation){
            if($roomsRepository->findAvailableRooms($accommodation->getIdAccommodation(), $begin, $end))
            array_push($freeAccommodations,$accommodation);
        }
        return $this->json($freeAccommodations);
    }

    /**
     * @Route("/room/{id}", name="room", methods={"GET"})
     * @param int $id
     * @param RoomsRepository $roomsRepository
     * @return JsonResponse
     */
    public function getRoom(int $id, RoomsRepository $roomsRepository): JsonResponse
    {
        $room = $roomsRepository->findRoom($id);
        return $this->json($room);
    }
}