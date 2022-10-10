<?php

namespace App\Controller\Admin;

use App\Entity\Statistique;
use App\Form\StatistiqueType;
use App\Repository\StatistiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/statistique')]
class StatistiqueController extends AbstractController
{
    #[Route('/new', name: 'app_statistique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StatistiqueRepository $statistiqueRepository): Response
    {
        $statistique = new Statistique();
        $form = $this->createForm(StatistiqueType::class, $statistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statistiqueRepository->add($statistique, true);

            return $this->redirectToRoute('app_statistique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statistique/new.html.twig', [
            'statistique' => $statistique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_statistique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Statistique $statistique, StatistiqueRepository $statistiqueRepository): Response
    {
        $form = $this->createForm(StatistiqueType::class, $statistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statistiqueRepository->add($statistique, true);

            return $this->redirectToRoute('app_statistique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statistique/edit.html.twig', [
            'statistique' => $statistique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_statistique_delete', methods: ['POST'])]
    public function delete(Request $request, Statistique $statistique, StatistiqueRepository $statistiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statistique->getId(), $request->request->get('_token'))) {
            $statistiqueRepository->remove($statistique, true);
        }

        return $this->redirectToRoute('app_statistique_index', [], Response::HTTP_SEE_OTHER);
    }
}
