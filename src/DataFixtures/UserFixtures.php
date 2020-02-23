<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    for ($i = 0; $i < 1; $i++) {
      $user = (new User())
        ->setUsername('test')
        ->setPassword('test')
        ->setEmail('test@hotmail.com');
      $manager->persist($user);
    }
    $manager->flush();
  }
}
