<?php

namespace App\Controller\Admin;

use App\Entity\Artiste;
use App\Form\ArtisteType;
use App\Repository\ArtisteRepository;
use App\Repository\SousStatistiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/artiste')]
class ArtisteController extends AbstractController
{
    #[Route('/new', name: 'app_artiste_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ArtisteRepository $artisteRepository, SousStatistiqueRepository $sousStatistiqueRepository): Response
    {
        $artiste = new Artiste();
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);
        $ssGroupByStat = $sousStatistiqueRepository->findGroupByStat();
        if ($form->isSubmitted() && $form->isValid()) {
            $artisteRepository->add($artiste, true);

            return $this->redirectToRoute('app_artiste_index', [], Response::HTTP_SEE_OTHER);
        }
// dd($sousStatistiqueRepository->findAll());
        return $this->renderForm('artiste/new.html.twig', [
            'artiste' => $artiste,
            'form' => $form,
            'sss' => $ssGroupByStat 
        ]);
    }
    #[Route('/{id}/edit', name: 'app_artiste_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Artiste $artiste, ArtisteRepository $artisteRepository): Response
    {
        $form = $this->createForm(ArtisteType::class, $artiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artisteRepository->add($artiste, true);

            return $this->redirectToRoute('app_artiste_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('artiste/edit.html.twig', [
            'artiste' => $artiste,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_artiste_delete', methods: ['POST'])]
    public function delete(Request $request, Artiste $artiste, ArtisteRepository $artisteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$artiste->getId(), $request->request->get('_token'))) {
            $artisteRepository->remove($artiste, true);
        }

        return $this->redirectToRoute('app_artiste_index', [], Response::HTTP_SEE_OTHER);
    }
}
