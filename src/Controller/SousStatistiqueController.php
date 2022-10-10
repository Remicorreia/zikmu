<?php

namespace App\Controller;

use App\Entity\SousStatistique;
use App\Repository\SousStatistiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sous/statistique')]
class SousStatistiqueController extends AbstractController
{
    #[Route('/', name: 'app_sous_statistique_index', methods: ['GET'])]
    public function index(SousStatistiqueRepository $sousStatistiqueRepository): Response
    {        
        return $this->render('sous_statistique/index.html.twig', [
            'sous_statistiques' => $sousStatistiqueRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_sous_statistique_show', methods: ['GET'])]
    public function show(SousStatistique $sousStatistique): Response
    {
        return $this->render('sous_statistique/show.html.twig', [
            'sous_statistique' => $sousStatistique,
        ]);
    }
}
