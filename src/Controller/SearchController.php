<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Entity\Thematic;
use App\Entity\Exercise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ExerciseRepository; // Importez ExerciseRepository

class SearchController extends AbstractController
{
    private $entityManager;
    private $exerciseRepository; // Déclarez la propriété $exerciseRepository

    // Injecter EntityManagerInterface et ExerciseRepository dans le constructeur
    public function __construct(EntityManagerInterface $entityManager, ExerciseRepository $exerciseRepository)
    {
        $this->entityManager = $entityManager;
        $this->exerciseRepository = $exerciseRepository; // Affectez le paramètre $exerciseRepository à la propriété $exerciseRepository
    }
    
    #[Route('/search', name: 'search')]
    public function accueil(Request $request): Response
    {
        $searchCriteria = [];
        $searchCriteria['classroom'] = $request->request->get('classroom');
        $searchCriteria['thematic'] = $request->request->get('thematic');
        $searchCriteria['keyword'] = $request->request->get('keyword');
        // Récupérer les critères de recherche depuis la requête
        
        $classrooms = $this->entityManager->getRepository(Classroom::class)->findAll();
        $thematics = $this->entityManager->getRepository(Thematic::class)->findAll();
        // Utilisez $this->exerciseRepository pour rechercher les exercices
        $exercises = $this->exerciseRepository->findBySearchCriteria($searchCriteria);

        return $this->render('search.html.twig', [
            'classrooms' => $classrooms,
            'thematics' => $thematics,
            'exercises' => $exercises,
            'searchCriteria' => $searchCriteria,
        ]);
    }
}
