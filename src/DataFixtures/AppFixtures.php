<?php

namespace App\DataFixtures;

use App\Entity\Manager;
use App\Entity\Order;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $em): void
    {
        $managers = [];
        for ($i=0; $i < 10; $i++) {
            $manager = (new Manager())
                ->setFirstName("FirstName $i")
                ->setLastName("LastName $i")
                ->setBirthdate(new DateTime())
            ;
            $em->persist($manager);
            $managers[] = $manager;

            $order = (new Order())
                ->setName("OrderName $i")
                ->setManager($manager)
            ;
            $em->persist($order);
        }

        for ($i=count($managers); $i < 50; $i++) {
            $order = (new Order())
                ->setName("OrderName $i")
                ->setManager($managers[array_rand($managers)])
            ;
            $em->persist($order);
        }

        $em->flush();
    }
}
