<?php

namespace App\Repository;

use App\Entity\PlanTrabajoMensual;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlanTrabajoMensual|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanTrabajoMensual|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanTrabajoMensual[]    findAll()
 * @method PlanTrabajoMensual[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanTrabajoMensualRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlanTrabajoMensual::class);
    }

//    /**
//     * @return PlanTrabajoMensual[] Returns an array of PlanTrabajoMensual objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanTrabajoMensual
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
