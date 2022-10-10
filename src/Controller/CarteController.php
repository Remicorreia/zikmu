<?php

namespace App\Controller;

use App\Entity\Carte;
use App\Repository\CarteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/carte')]
class CarteController extends AbstractController
{
    #[Route('/', name: 'app_carte_index', methods: ['GET'])]
    public function index(CarteRepository $carteRepository): Response
    {
        return $this->render('carte/index.html.twig', [
            'cartes' => $carteRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_carte_show', methods: ['GET'])]
    public function show(Carte $carte): Response
    {
        return $this->render('carte/show.html.twig', [
            'carte' => $carte,
        ]);
    }
}
