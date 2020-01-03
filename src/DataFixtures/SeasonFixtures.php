<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\Entity\Category;
use App\Entity\Actor;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [ProgramFixtures::class];
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        // fakers values
        for ($i = 0; $i < 20; $i++) {
            $season = new Season();
            $season->setProgram($this->getReference('program'. rand(0,count(ProgramFixtures::PROGRAMS)-1)));
            $season->setDescription($faker->text);
            $season->setYear(rand (1900 , 2000));
            $this->addReference('season' . $i, $season);
            $manager->persist($season);
        }

        $manager->flush();
    }
}
