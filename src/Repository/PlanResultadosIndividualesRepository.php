<?php

namespace App\Repository;

use App\Entity\PlanResultadosIndividuales;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlanResultadosIndividuales|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanResultadosIndividuales|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanResultadosIndividuales[]    findAll()
 * @method PlanResultadosIndividuales[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanResultadosIndividualesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlanResultadosIndividuales::class);
    }

//    /**
//     * @return PlanResultadosIndividuales[] Returns an array of PlanResultadosIndividuales objects
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
    public function findOneBySomeField($value): ?PlanResultadosIndividuales
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
