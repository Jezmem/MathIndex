<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Exercise;

class ExerciceController extends AbstractController
{
    #[Route('/mes-exercices', name: 'mes_exercices')]
    public function index(UserInterface $user)
    {
        $exercices = $this->getDoctrine()
            ->getRepository(Exercise::class)
            ->findBy(['user' => $user]);

        return $this->render('exercice/exercise.html.twig', [
            'exercices' => $exercices,
        ]);
    }

    #[Route('/supprimer-exercice/{id}', name: 'supprimer_exercice')]
    public function delete(Exercise $exercice)
    {
        // Supprimer l'exercice
    }
}