<?php

namespace App\DataFixtures;

use App\Entity\Quest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class QuestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

      $totalQuest = 5;

      $title = [
        'Tri de déchets',
        'Regarder une vidéo',
        'Vélo électrique',
        'Don',
        'Manger mieux'
      ];

      $description = [
        'Faites le tri de vos déchets',
        'Voir une vidéo explicative sur le tri de déchets',
        'Utiliser un vélo électrique',
        'Faites un don à une association',
        'Manger dans un restaurant responsable '
      ];

      $adress = [
        'adress',
        'adress',
        'adress',
        'adress',
        'adress'
      ];

      $category = [
        'Déchets',
        'Déchets',
        'Moins polluer',
        'Moins polluer',
        'Manger responsable'
      ];

      $city = [
        'N\'import où',
        'N\'import où',
        'Paris',
        'Paris',
        'Paris'
      ];

      $picture = [
        'Picture',
        'Picture',
        'Picture',
        'Picture',
        'Picture'
      ];

      $duration = [
        '10',
        '10',
        '10',
        '10',
        '10'
      ];

      for ($i= 0; $i < $totalQuest; $i++) {
        $quest = (new Quest())
          ->setTitle($title[$i])
          ->setDescription($description[$i])
          ->setAddress($adress[$i])
          ->setCategory($category[$i])
          ->setCity($city[$i])
          ->setPicture($picture[$i])
          ->setDuration($duration[$i])
        ;
        $manager->persist($quest);
      }
      $manager->flush();
    }
}
