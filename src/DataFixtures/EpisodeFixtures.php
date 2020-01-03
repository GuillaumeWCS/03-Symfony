<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Entity\Category;
use App\Entity\Actor;
use App\Entity\Season;
use App\Entity\Episode;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // fakers values
        for ($i = 0; $i < 20; $i++) {
            $episode = new Episode();
            $episode->setSeason($this->getReference("season0"));
            $episode->setTitle($faker->text);
            $episode->setNumber($faker->randomDigit);
            $episode->setSynopsis($faker->text);
            $this->addReference('episode' . $i, $episode);
            $manager->persist($episode);
        }

        $manager->flush();
    }
}
