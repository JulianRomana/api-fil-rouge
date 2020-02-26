<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use APP\Entity\Links;

class LinksFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $user = (new Links())
        ->setCategorie('déchets')
        ->setDescription('Voici une solution pour vous permettre de ne pas jeter de vos objets, vous pouvez tout simplement les faire réparer !')
        ->setLink('https://fr.ifixit.com/Tutoriel')
        ->setName('repare');
      $manager->persist($user);
      $manager->flush();
    }
}
