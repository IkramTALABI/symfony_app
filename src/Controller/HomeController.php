<?php

namespace App\Controller;


use App\Repository\PropertyRepository;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController
{
    /**
     * @var Environment
     */

    private $twig;
    private $repository;

    public function __construct(Environment $twig, PropertyRepository $repository)
    {
        $this->repository = $repository;
        $this->twig = $twig;
    }

    public function index(): Response
    {
        $properties=$this->repository->findLatest();

        return new Response($this->twig->render('pages/home.html.twig', [
            'properties'=>$properties
        ]));
    }
}

