<?php

namespace App\DataFixtures;

use App\Entity\Quest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class QuestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

      $quest = (new Quest())
        ->setTitle('Toto')
        ->setDescription('Lorem ipsum dolor sit amet')
        ->setAddress('25 rue Victor Hugo')
        ->setCategory('Nourriture')
        ->setCity('Paris')
        ->setPicture('Picture')
        ->setDuration('10');

      $quest1 = (new Quest())
        ->setTitle('Toto')
        ->setDescription('Lorem dolores ipsum dolor sit amet')
        ->setAddress('18 rue Victor Hugo')
        ->setCategory('Déchets')
        ->setCity('Paris')
        ->setPicture('Picture')
        ->setDuration('10');

      $quest2 = (new Quest())
        ->setTitle('Toto')
        ->setDescription('Lorem ipsum dolor sit amet')
        ->setAddress('18 rue Victor ')
        ->setCategory('Pollution')
        ->setCity('Paris')
        ->setPicture('Picture')
        ->setDuration('10');

      $quest3 = (new Quest())
        ->setTitle('Toto')
        ->setDescription('Lorem ipsum dolor sit amet')
        ->setAddress('18 rue  Hugo')
        ->setCategory('Nourriture')
        ->setCity('Paris')
        ->setPicture('D')
        ->setDuration('10');

      $allQuest = [
        $quest,
        $quest1,
        $quest2,
        $quest3
      ];

      foreach($allQuest as $quest) {
        $manager->persist($quest);
      }

      $manager->flush();
    }
}
