<?php declare(strict_types=1);

namespace MF\FavoriteMovies\GraphQL\Controller;

use MF\FavoriteMovies\GraphQL\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(MovieRepository $movieRepository): Response
    {
        //dump($movieRepository->findFirst10());

        return new Response('Welcome to favorite movies graph QL');
    }
}
