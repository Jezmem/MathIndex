<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/classroom')]
class ClassroomController extends AbstractController
{
    #[Route('/', name: 'app_classroom_index', methods: ['GET'])]
    public function index(ClassroomRepository $classroomRepository, Request $request, PaginatorInterface $paginator): Response
    {
         $classroom = $classroomRepository->findAll();
            // Paginator
            $pagination = $paginator->paginate(
            $classroom,
            $request->query->get('page', 1),
            5
        );
        return $this->render('classroom/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_classroom_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $classroom = new Classroom();
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($classroom);
            $entityManager->flush();

            return $this->redirectToRoute('app_classroom_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('classroom/new.html.twig', [
            'classroom' => $classroom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classroom_show', methods: ['GET'])]
    public function show(Classroom $classroom): Response
    {
        return $this->render('classroom/show.html.twig', [
            'classroom' => $classroom,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_classroom_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Classroom $classroom, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ClassroomType::class, $classroom);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->flush();

            return $this->redirectToRoute('app_classroom_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('classroom/edit.html.twig', [
            'classroom' => $classroom,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classroom_delete', methods: ['POST'])]
    public function delete(Request $request, Classroom $classroom, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classroom->getId(), $request->request->get('_token'))) {
            $entityManager->remove($classroom);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_classroom_index', [], Response::HTTP_SEE_OTHER);
    }
}
