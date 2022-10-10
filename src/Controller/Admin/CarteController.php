<?php

namespace App\Controller\Admin;

use App\Entity\Carte;
use App\Form\CarteType;
use App\Repository\CarteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/carte')]
class CarteController extends AbstractController
{
    #[Route('/new', name: 'app_carte_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CarteRepository $carteRepository): Response
    {
        $carte = new Carte();
        $form = $this->createForm(CarteType::class, $carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $carteRepository->add($carte, true);

            return $this->redirectToRoute('app_carte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carte/new.html.twig', [
            'carte' => $carte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_carte_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Carte $carte, CarteRepository $carteRepository): Response
    {
        $form = $this->createForm(CarteType::class, $carte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $carteRepository->add($carte, true);

            return $this->redirectToRoute('app_carte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('carte/edit.html.twig', [
            'carte' => $carte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_carte_delete', methods: ['POST'])]
    public function delete(Request $request, Carte $carte, CarteRepository $carteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carte->getId(), $request->request->get('_token'))) {
            $carteRepository->remove($carte, true);
        }

        return $this->redirectToRoute('app_carte_index', [], Response::HTTP_SEE_OTHER);
    }
}
