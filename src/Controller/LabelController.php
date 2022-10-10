<?php

namespace App\Controller;

use App\Entity\Label;
use App\Repository\LabelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/label')]
class LabelController extends AbstractController
{
    #[Route('/', name: 'app_label_index', methods: ['GET'])]
    public function index(LabelRepository $labelRepository): Response
    {
        return $this->render('label/index.html.twig', [
            'labels' => $labelRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_label_show', methods: ['GET'])]
    public function show(Label $label): Response
    {
        return $this->render('label/show.html.twig', [
            'label' => $label,
        ]);
    }
}
