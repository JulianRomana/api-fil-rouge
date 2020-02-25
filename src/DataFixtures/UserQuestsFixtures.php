<?php

namespace App\DataFixtures;

use App\Entity\Quest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\UserQuest;
use App\Entity\User;

class UserQuestsFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    /**for ($i = 0; $i < 1; $i++) {
      $user_quest = (new UserQuest())
        ->setQuestId('/api/quest/16')
        ->setUserId('/api/users/8')
        ->setStatus(1);
      $manager->persist($user_quest);
    }
    $manager->flush();*/
  }
}
