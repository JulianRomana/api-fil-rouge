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
        ->setTitle('Tri de déchets')
        ->setDescription('Faites le tri de vos déchets')
        ->setAddress('adress')
        ->setCategory('Déchets')
        ->setCity('N\'import où')
        ->setPicture('Picture')
        ->setDuration('10');

      $quest1 = (new Quest())
        ->setTitle('Regarder une vidéo')
        ->setDescription('Voir une vidéo explicative sur le tri de déchets')
        ->setAddress('adress')
        ->setCategory('Déchets')
        ->setCity('N\'import où')
        ->setPicture('Picture')
        ->setDuration('10');

      $quest2 = (new Quest())
        ->setTitle('Vélo électrique')
        ->setDescription('Utiliser un vélo électrique')
        ->setAddress('adress')
        ->setCategory('Moins polluer')
        ->setCity('Paris')
        ->setPicture('Picture')
        ->setDuration('10');

      $quest3 = (new Quest())
        ->setTitle('Don')
        ->setDescription('Faites un don à une association')
        ->setAddress('adress')
        ->setCategory('Moins polluer')
        ->setCity('internet')
        ->setPicture('picture')
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
