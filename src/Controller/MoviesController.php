<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MoviesController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {
        //findAll() - SELECT * FROM movies;
        //find() - SELECT * FROM movies WHERE id = 5
        //findBy() - SELECT * FROM movies ORDER BY id DESC
        //findOneBy() - SELECT * FROM movies WHERE id=6 AND title = 'Oppenheimer' ORDER BY id DESCs
        //count() - SELECT COUNT() FROM movies WHERE id = 1
        //
        $repository = $this->entityManager->getRepository(Movie::class);

        $movies = $repository->getClassName();

        dd($movies);

        return $this->render('index.html.twig');
    }

}
