<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $totalRestaurant = 1;

      $description = [
        'Restaurant éco-reponsable'
      ];

      $city = [
        'Paris'
      ];

      $adress = [
        '8 rue de la rochefoucaud'
      ];

      $geo = [
        ["", ""]
      ];

      $name = [
        "Le bigornot"
      ];

      for ($i= 0; $i < $totalRestaurant; $i++) {
        $restaurant = (new Restaurant())
          ->setDescription($description[$i])
          ->setCity($city[$i])
          ->setAdress($adress[$i])
          ->setGeo($geo[$i])
          ->setName($name[$i]);
        $manager->persist($restaurant);
      }
      $manager->flush();
    }
}
