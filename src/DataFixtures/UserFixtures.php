<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $user1 = new User();
        $user1->setEmail('pierredupont@gmail.com');
        $user1->setFirstName('Pierre');
        $user1->setLastName('Dupont');
        $user1->setRoles(['USER']);
        $user1->setPassword('$argon2i$v=19$m=16,t=2,p=1$OGV5VmNnbm1kNTRzYlpWWQ$BjR4kkRl8t7d4I5/pqj+jg'); // "admin" en argon2i
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('mariemartin@gmail.com');
        $user2->setFirstName('Marie');
        $user2->setLastName('Martin');
        $user2->setRoles(['USER']);
        $user2->setPassword('$argon2i$v=19$m=16,t=2,p=1$OGV5VmNnbm1kNTRzYlpWWQ$BjR4kkRl8t7d4I5/pqj+jg'); // "admin" en argon2i
        $manager->persist($user2);

        $user3 = new User();
        $user3->setEmail('jeanadmin@gmail.com');
        $user3->setFirstName('Jean');
        $user3->setLastName('Admin');
        $user3->setRoles(['ADMIN']);
        $user3->setPassword('$argon2i$v=19$m=16,t=2,p=1$OGV5VmNnbm1kNTRzYlpWWQ$BjR4kkRl8t7d4I5/pqj+jg'); // "admin" en argon2i
        $manager->persist($user3);

        $user4 = new User();
        $user4->setEmail('lucielefebvre@gmail.com');
        $user4->setFirstName('Lucie');
        $user4->setLastName('Lefebvre');
        $user4->setRoles(['CONTRIBUTOR']);
        $user4->setPassword('$argon2i$v=19$m=16,t=2,p=1$OGV5VmNnbm1kNTRzYlpWWQ$BjR4kkRl8t7d4I5/pqj+jg'); // "admin" en argon2i
        $manager->persist($user4);

        $manager->flush();
    }
}