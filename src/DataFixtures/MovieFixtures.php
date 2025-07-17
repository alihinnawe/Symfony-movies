<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use App\Entity\Actor; // <-- Make sure this use statement exists
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The dark night.');
        $movie->setReleaseYear(2008);
        $movie->setDescription('The dark night description.');
        $movie->setImagePath('https://images.hdqwalls.com/wallpapers/the-path-to-power-batman-eu.jpg');
        $movie->addActor($this->getReference('actor_1', Actor::class));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('game');
        $movie2->setReleaseYear(2009);
        $movie2->setDescription('The avengures description.');
        $movie2->setImagePath('https://freepngimg.com/thumb/batman/4-2-batman-dark-knight-logo-png.png');
        $movie2->addActor($this->getReference('actor_2', Actor::class));
        $manager->persist($movie2);

        $manager->flush();
    }
}
