<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use \App\Entity\Restaurant;

class RestaurantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $totalRestaurants = 10;
        $names = [
            'Simone Lemon',
            'Le Bichat',
            'Pur etc',
            'La Recyclerie',
            'Le PH7',
            'Yuman',
            'Nous',
            'Liife',
            'Bloom',
            'Grand Beau',
        ];
        $address = [
            'rue le Peltier',
            'rue bichat',
            'rue des jeuneurs',
            'boulevard ornano',
            'rue le peltier',
            'rue de chevaleret',
            'rue de châteaudun',
            'rue des petits carreaux',
            'avenue Parmentier',
            'rue Linois'
        ];
        $streetNumber = [
            '30',
            '11',
            '21',
            '83',
            '21',
            '70',
            '8',
            '33',
            '126',
            '15'
        ];
        $zipCode = [
            '09',
            '10',
            '02',
            '18',
            '09',
            '13',
            '09',
            '02',
            '11',
            '15'
        ];

        for ($i= 0; $i < $totalRestaurants; $i++) {
            $restaurant = (new Restaurant())
                ->setName($names[$i])
                ->setCity('Paris')
                ->setAddress($address[$i])
                ->setStreetNumber($streetNumber[$i])
                ->setZipcode($zipCode[$i])
            ;
            $manager->persist($restaurant);
        }

        $manager->flush();
    }
}
