<?php

namespace App\Controller;

use App\Form\GeneralInformationType;
use App\Form\SourcesType;
use App\Form\FilesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SubmitExerciseController extends AbstractController
{
    #[Route('/soumettre-exercice/general-information', name: 'submit_exercise_general_information')]
    public function generalInformation(Request $request): Response
    {
        $form = $this->createForm(GeneralInformationType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // handle the first form submission
        }

        return $this->render('submit_exercise/general_information.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/soumettre-exercice/sources', name: 'submit_exercise_sources')]
    public function sources(Request $request): Response
    {
        $form = $this->createForm(SourcesType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // handle the second form submission
        }

        return $this->render('submit_exercise/sources.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/soumettre-exercice/files', name: 'submit_exercise_files')]
    public function files(Request $request): Response
    {
        $form = $this->createForm(FilesType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // handle the third form submission
        }

        return $this->render('submit_exercise/files.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}