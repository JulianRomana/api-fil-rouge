<?php

namespace App\DataFixtures;

use App\Entity\Greenwalk;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GreenwalkFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

      $totalGreenwalk = 2;

      $description = [
        'GreenWalk Saint Lazare.',
        'GreenWalk Champs-Élysées.'
      ];

      $city = [
        'Paris',
        'Paris'
      ];

      $adress = [
        '8 rue de la rochefoucaud',
        'Avenue des Champs-Élysées'
      ];

      $geo = [
        ["48.8776054", "2.3334023"],
        ["48.8704013", "2.3083309"]
      ];

      $date = [
        "07-08-2020 09:00 GMT",
        "05-05-2020 09:00 GMT"
      ];

      for($i= 0; $i < $totalGreenwalk; $i++) {
        $greewalk = (new Greenwalk())
          ->setDescription($description[$i])
          ->setCity($city[$i])
          ->setAdress($adress[$i])
          ->setDate($date[$i])
          ->setGeo($geo[$i]);
        $manager->persist($greewalk);
      }
      $manager->flush();
    }
}
