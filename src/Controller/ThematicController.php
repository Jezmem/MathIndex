<?php

namespace App\Controller;

use App\Entity\Thematic;
use App\Form\ThematicType;
use App\Repository\ThematicRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/thematic')]
class ThematicController extends AbstractController
{
    #[Route('/', name: 'app_thematic_index', methods: ['GET'])]
    public function index(ThematicRepository $thematicRepository, Request $request, PaginatorInterface $paginator): Response
    {   
        $thematic = $thematicRepository->findAll();
        // Paginator
        $pagination = $paginator->paginate(
            $thematic,
            $request->query->get('page', 1),
            5
        );
        return $this->render('thematic/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_thematic_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $thematic = new Thematic();
        $form = $this->createForm(ThematicType::class, $thematic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($thematic);
            $entityManager->flush();

            return $this->redirectToRoute('app_thematic_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('thematic/new.html.twig', [
            'thematic' => $thematic,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_thematic_show', methods: ['GET'])]
    public function show(Thematic $thematic): Response
    {
        return $this->render('thematic/show.html.twig', [
            'thematic' => $thematic,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_thematic_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Thematic $thematic, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ThematicType::class, $thematic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_thematic_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('thematic/edit.html.twig', [
            'thematic' => $thematic,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_thematic_delete', methods: ['POST'])]
    public function delete(Request $request, Thematic $thematic, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$thematic->getId(), $request->request->get('_token'))) {
            $entityManager->remove($thematic);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_thematic_index', [], Response::HTTP_SEE_OTHER);
    }
}
