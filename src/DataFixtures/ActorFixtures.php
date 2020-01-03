<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Entity\Category;
use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;


class ActorFixtures extends Fixture implements DependentFixtureInterface
{
    const ACTORS = [
        "Nom d'acteur 1",
        "Nom d'acteur 2",
        "Nom d'acteur 3",
        "Nom d'acteur 4",
        "Nom d'acteur 5",
    ];

    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // fakers values
        for ($i = 0; $i < 20; $i++) {
            $actor = new Actor();
            $actor->setName($faker->name);
            $this->addReference('actor' . $i, $actor);
            $manager->persist($actor);
        }

        // array const values
        foreach (self::ACTORS as $key => $actorsName) {
            $actor2 = new Actor();
            $actor2->setName($actorsName);
            $this->addReference('actor' .$actorsName, $actor2);
            $manager->persist($actor2);
        }

        $manager->flush();
    }
}
