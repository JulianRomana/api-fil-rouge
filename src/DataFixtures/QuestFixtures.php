<?php

namespace App\DataFixtures;

use App\Entity\Quest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class QuestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for ($i = 0; $i < 5; $i++) {
        $quest = (new Quest())
          ->setTitle('Toto')
          ->setDescription('Lorem ipsum dolor sit amet')
          ->setAddress('18 rue Victor Hugo')
          ->setCategory('Déchets')
          ->setCity('Paris')
          ->setPicture('Picture')
          ->setDuration('10')
        ;
        $manager->persist($quest);
      }
      $manager->flush();
    }
}
