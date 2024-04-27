<?php

namespace App\Controller;

use App\Entity\Origin;
use App\Form\OriginType;
use App\Repository\OriginRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/origin')]
class OriginController extends AbstractController
{
    #[Route('/', name: 'app_origin_index', methods: ['GET'])]
    public function index(OriginRepository $originRepository): Response
    {
        return $this->render('origin/index.html.twig', [
            'origins' => $originRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_origin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $origin = new Origin();
        $form = $this->createForm(OriginType::class, $origin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {        
            $entityManager->persist($origin);
            $entityManager->flush();

            return $this->redirectToRoute('app_origin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('origin/new.html.twig', [
            'origin' => $origin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_origin_show', methods: ['GET'])]
    public function show(Origin $origin): Response
    {
    
        return $this->render('origin/show.html.twig', [
            'origin' => $origin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_origin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Origin $origin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OriginType::class, $origin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_origin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('origin/edit.html.twig', [
            'origin' => $origin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_origin_delete', methods: ['POST'])]
    public function delete(Request $request, Origin $origin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$origin->getId(), $request->request->get('_token'))) {
            $entityManager->remove($origin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_origin_index', [], Response::HTTP_SEE_OTHER);
    }
}
