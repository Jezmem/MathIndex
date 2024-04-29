<?php

namespace App\Repository;

use App\Entity\Exercise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Exercise>
 *
 * @method Exercise|null find($id, $lockMode = null, $lockVersion = null)
 * @method Exercise|null findOneBy(array $criteria, array $orderBy = null)
 * @method Exercise[]    findAll()
 * @method Exercise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExerciseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Exercise::class);
    }

    /**
     * @return Exercise[] Returns an array of Exercise objects
     */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?Exercise
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function findBySearchCriteria($criteria)
    {
        $queryBuilder = $this->createQueryBuilder('e');



        if (!empty($criteria['thematic'])) {
            $queryBuilder->andWhere('e.thematic = :thematic')
                ->setParameter('thematic', $criteria['thematic']);
        }

        if (!empty($criteria['keyword'])) {
            $queryBuilder->andWhere('e.name LIKE :keyword')
                ->setParameter('keyword', '%' . $criteria['keyword'] . '%');
        }

        $queryBuilder->orderBy('e.name', 'ASC');

        return $queryBuilder->getQuery()->getResult();
    }
}
