<?php

namespace App\Controller\Admin;

use App\Entity\SousStatistique;
use App\Form\SousStatistiqueType;
use App\Repository\SousStatistiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/sous/statistique')]
class SousStatistiqueController extends AbstractController
{
    #[Route('/new', name: 'app_sous_statistique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SousStatistiqueRepository $sousStatistiqueRepository): Response
    {
        $sousStatistique = new SousStatistique();
        $form = $this->createForm(SousStatistiqueType::class, $sousStatistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sousStatistiqueRepository->add($sousStatistique, true);

            return $this->redirectToRoute('app_sous_statistique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sous_statistique/new.html.twig', [
            'sous_statistique' => $sousStatistique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sous_statistique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SousStatistique $sousStatistique, SousStatistiqueRepository $sousStatistiqueRepository): Response
    {
        $form = $this->createForm(SousStatistiqueType::class, $sousStatistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sousStatistiqueRepository->add($sousStatistique, true);

            return $this->redirectToRoute('app_sous_statistique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sous_statistique/edit.html.twig', [
            'sous_statistique' => $sousStatistique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sous_statistique_delete', methods: ['POST'])]
    public function delete(Request $request, SousStatistique $sousStatistique, SousStatistiqueRepository $sousStatistiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sousStatistique->getId(), $request->request->get('_token'))) {
            $sousStatistiqueRepository->remove($sousStatistique, true);
        }

        return $this->redirectToRoute('app_sous_statistique_index', [], Response::HTTP_SEE_OTHER);
    }
}
