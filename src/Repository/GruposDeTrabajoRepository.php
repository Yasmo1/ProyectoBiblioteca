<?php

namespace App\Repository;

use App\Entity\GruposDeTrabajo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GruposDeTrabajo|null find($id, $lockMode = null, $lockVersion = null)
 * @method GruposDeTrabajo|null findOneBy(array $criteria, array $orderBy = null)
 * @method GruposDeTrabajo[]    findAll()
 * @method GruposDeTrabajo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GruposDeTrabajoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GruposDeTrabajo::class);
    }

//    /**
//     * @return GruposDeTrabajo[] Returns an array of GruposDeTrabajo objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GruposDeTrabajo
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
