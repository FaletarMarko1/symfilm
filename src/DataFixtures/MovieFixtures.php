<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle("Oppenheimer");
        $movie ->setReleaseYear(2023);
        $movie ->setDescription("Description of the Oppenheimer movie");
        $movie->setImagePath('https://cdn.pixabay.com/photo/2023/08/02/03/26/ai-generated-8164217_1280.jpg');
        //adding data to pivot table hahaha
        $movie->addActor($this->getReference("actor_1"));
        $movie->addActor($this->getReference("actor_2"));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle("Batman");
        $movie2 ->setReleaseYear(2008);
        $movie2 ->setDescription("Description of the Batman movie");
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2024/01/15/11/36/batman-8510022_1280.png');
        //adding data
        $movie2->addActor($this->getReference("actor_3"));
        $movie2->addActor($this->getReference("actor_4"));
        $manager->persist($movie2);

        $manager->flush();
    }
}
