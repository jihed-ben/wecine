<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Tmdb\Repository\MovieRepository;
use Tmdb\Client;

/**
 * 
 */
class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(Request $request, MovieRepository $movieRepository, Client $client): Response
    {
        //dump($client->getMoviesApi()->getRecommendations(87421));exit;
        return $this->render('main/index.html.twig', [
            'movie' => $client->getMoviesApi()->getMovie(87421),
            'genres' => $client->getGenresApi()->getMovieGenres(),
            'movies' => $client->getMoviesApi()->getRecommendations(87421)
        ]);
    }
}
