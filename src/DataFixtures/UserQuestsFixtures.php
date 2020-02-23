<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\UserQuest;

class UserQuestsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      //for ($i = 0; $i < 5; $i++) {
        //$user = (new UserQuest())
        //$manager->persist($user);
      }

      //  $manager->flush();
    }
