<?php

namespace App\Controller;

use App\Entity\Statistique;
use App\Repository\StatistiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/statistique')]
class StatistiqueController extends AbstractController
{
    #[Route('/', name: 'app_statistique_index', methods: ['GET'])]
    public function index(StatistiqueRepository $statistiqueRepository): Response
    {
        return $this->render('statistique/index.html.twig', [
            'statistiques' => $statistiqueRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_statistique_show', methods: ['GET'])]
    public function show(Statistique $statistique): Response
    {
        return $this->render('statistique/show.html.twig', [
            'statistique' => $statistique,
        ]);
    }
}
