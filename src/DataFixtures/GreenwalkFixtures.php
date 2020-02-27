<?php

namespace App\DataFixtures;

use App\Entity\Greenwalk;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GreenwalkFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

      $totalGreenwalk = 4;

      $description = [
        'GreenWalk Saint Lazare',
        'GreenWalk Champs-Élysées',
        'GreenWalk Place d\'Italie',
        'GreenWalk Mairie du 19ème',
      ];

      $city = [
        'Paris',
        'Paris',
        'Paris',
        'Paris'
      ];

      $adress = [
        '8 rue de la rochefoucaud',
        'Avenue des Champs-Élysées',
        'Place d\'Italie',
        'Mairie du 19ème'
      ];

      $geo = [
        [2.3334023, 48.8776054],
        [2.3083309, 48.8704013],
        [2.3641661, 48.8300648],
        [2.3823652, 48.8815781]
      ];

      $date = [
        "07-08-2020 09:00 GMT",
        "05-05-2020 09:00 GMT",
        "22-03-2020 8:30 GMT",
        "15-06-2020 9:00 GMT"
      ];

      $postalCode = [
        "75009",
        "75008",
        "75013",
        "75019"
      ];

      for($i= 0; $i < $totalGreenwalk; $i++) {
        $greewalk = (new Greenwalk())
          ->setDescription($description[$i])
          ->setCity($city[$i])
          ->setAdress($adress[$i])
          ->setDate($date[$i])
          ->setGeo($geo[$i])
          ->setPostalCode($postalCode[$i]);
        $manager->persist($greewalk);
      }
      $manager->flush();
    }
}
