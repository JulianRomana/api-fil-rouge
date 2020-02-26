<?php

namespace App\Controller;

use App\Repository\UserQuestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\UserQuest;

class UserQuests
{

  public function __construct(EntityManagerInterface $entityManager)
  {
    $this->entityManager = $entityManager;
  }

  /**
   * @Route("/user_quests/{id}", methods={"GET"}, name="getUser_Quest")
   */
  public function getUserQuest($id) {
    $user_quest = $this->entityManager
       ->getRepository(UserQuest::class)
       ->findAllQuestsById($id);
     $response = new JsonResponse($user_quest);
     return $response;
  }
}