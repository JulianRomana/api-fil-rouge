<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $totalRestaurant = 11;

      $name = [
        'l’Alcazar',
        'Brebant',
        'KLAY Saint Sauveur',
        'Kube hôtel',
        'Le comptoir général',
        'Hoxton Paris',
        'Pink Mamma',
        'La Terra',
        'l’Abattoir végétal',
        'La Felicità',
        'Chez Germain'
      ];

      $description = [
        'Un dîner qui en jette !',
        'Welcome to the jungle',
        'La cuisine healthy',
        'Un petit havre de paix',
        'Jardinerie endémique',
        'Terrasse estivale',
        'Green et cosy',
        'On se met au vert',
        'Restaurant végan dans une anienne boucherie',
        'Une réelle invitation au bonheur',
        'Manger bio'
      ];

      $city = [
        'Paris',
        'Paris',
        'Paris',
        'Paris',
        'Paris',
        'Paris',
        'Paris',
        'Paris',
        'Paris',
        'Paris',
        'Paris'
      ];

      $adress = [
        '62 Rue Mazarine',
        '32 Boulevard Poissonnière',
        '4 Bis Rue Saint-Sauveur',
        '1-5 Passage Ruelle',
        '80 Quai de Jemmapes',
        '30-32 Rue du Sentier',
        '20bis Rue de Douai',
        '21 Rue des Gravilliers',
        '61 Rue Ramey',
        '5 Parvis Alan Turing',
        '33 Rue Saint-André des Arts'
      ];

      $geo = [
        ["2.2908895", "48.8444696"],
        ["2.3411319", "48.8716199"],
        ["2.3476797", "48.8658543"],
        ["2.3566492", "48.8865295"],
        ["2.3630316", "48.8721154"],
        ["2.3444429", "48.8701829"],
        ["2.3322953", "48.8819433"],
        ["2.2994646", "48.8820255"],
        ["2.2994646", "48.8821278"],
        ["2.3708237", "48.8321454"],
        ["2.3395166", "48.8532736"]
      ];

      $postalCode = [
        '75006',
        '75009',
        '75002',
        '75018',
        '75010',
        '75002',
        '75009',
        '75003',
        '75018',
        '75013',
        '75006'
      ];

      for ($i= 0; $i < $totalRestaurant; $i++) {
        $restaurant = (new Restaurant())
          ->setDescription($description[$i])
          ->setCity($city[$i])
          ->setAdress($adress[$i])
          ->setGeo($geo[$i])
          ->setName($name[$i])
          ->setPostalCode($postalCode[$i]);
        $manager->persist($restaurant);
      }
      $manager->flush();
    }
}
