<?php

namespace App\Controller;

use App\Repository\UserQuestRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserQuests
{

  public function __construct(EntityManagerInterface $entityManager)
  {
    $this->entityManager = $entityManager;
  }

  /**
   * @Route("/user_quests/{id}", methods={"GET"}, name="getUser_Quest")
   */
  public function getUserQuest(Request $request) {
    $user_quest = $this->entityManager
       ->getRepository(UserQuestRepository::class)
       ->findAllQuestsById($request);

     $user_quest_array = $user_quest->getArrayResult();

     return new JsonResponse($user_quest_array);
  }

  /**
   * @Route("/user_quests", methods={"POST"}, name="postUser_Quest")
   */
  function postUserQuest(Request $request) {
    $user_quest = $this->entityManager
      ->getRepository(UserQuestRepository::class)
      ->setAllQuests($request);

    $user_quest_array = $user_quest->getArrayResult();

    return new JsonResponse($user_quest_array);
  }

  /**
   * @Route("/user_quests/{id}", methods={"PUT"}, name="putUser_Quest")
   */
  function putUserQuest(int $id) {

  }
}