<?php

namespace App\DataFixtures;

use App\Entity\Quest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class QuestFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

      $totalQuest = 12;

      $title = [
        //Déchets
        'Tri de déchets',
        'Regarder une vidéo',
        'Participer à un greenwalk',
        'Réparer vos objets',
        //Pollution
        'Vélo électrique',
        'Trottinette électrique',
        'Don',
        'Utiliser une voiture électrique',
        'Faites du coivoiturage',
        //Manger mieux
        'Manger mieux',
        'Manger sans viande',
        'Consommer mieux'
      ];

      $description = [
        //Déchets
        'Faites le tri de vos déchets',
        'Voir une vidéo explicative sur le tri de déchets',
        'Participer à un greenwalk sur Paris',
        'Faites réparer vos objets, pour ne pas les jeter',
        //Pollution
        'Utiliser un vélo électrique',
        'Utiliser une trotinette électrique',
        'Faites un don à une association pour lutter contre la pollution',
        'Faites un trajet en voiture électrique',
        'Faites un trajet en co-voiturage',
        //Manger mieux
        'Manger dans un restaurant responsable',
        'Ne pas manger de viande pendant une journée',
        'Faites vos course chez un marchand bio'
      ];

      $category = [
        'Les Déchets',
        'Les Déchets',
        'Les Déchets',
        'Les Déchets',
        'Moins polluer',
        'Moins polluer',
        'Moins polluer',
        'Moins polluer',
        'Moins polluer',
        'Manger responsable',
        'Manger responsable',
        'Manger responsable'
      ];

      $city = [
        //Déchets
        'N\'import où',
        'N\'import où',
        'Paris',
        'N\'import où',
        //Pollution
        'Paris',
        'Paris',
        'Internet',
        'N\'import où',
        'Paris',
        //Manger mieux
        'Paris',
        'N\'import où',
        'N\'import où',
      ];

      $picture = [
        //Déchets
        'https://www.mairie-lumio.fr/photo/art/grande/9004515-14294044.jpg?v=1456312410',
        'https://img.icons8.com/pastel-glyph/2x/monitor.png',
        'https://image.flaticon.com/icons/png/512/33/33887.png',
        'https://image.flaticon.com/icons/png/512/32/32108.png',
        //Pollution
        'https://image.flaticon.com/icons/png/512/71/71422.png',
        'https://image.flaticon.com/icons/svg/1553/1553987.svg',
        'https://image.flaticon.com/icons/png/512/69/69881.png',
        'https://upload.wikimedia.org/wikipedia/commons/5/57/Electric_car_icon.png',
        'https://static.thenounproject.com/png/40506-200.png',
        //Manger mieux
        'https://static.thenounproject.com/png/323505-200.png',
        'https://freeiconshop.com/wp-content/uploads/edd/meat-solid.png',
        'https://image.flaticon.com/icons/png/512/25/25150.png'
      ];

      for ($i= 0; $i < $totalQuest; $i++) {
        $quest = (new Quest())
          ->setTitle($title[$i])
          ->setDescription($description[$i])
          ->setCategory($category[$i])
          ->setCity($city[$i])
          ->setPicture($picture[$i])
        ;
        $manager->persist($quest);
      }
      $manager->flush();
    }
}
