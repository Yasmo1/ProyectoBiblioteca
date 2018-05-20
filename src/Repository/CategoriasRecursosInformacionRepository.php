<?php

namespace App\Repository;

use App\Entity\CategoriasRecursosInformacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoriasRecursosInformacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriasRecursosInformacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriasRecursosInformacion[]    findAll()
 * @method CategoriasRecursosInformacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriasRecursosInformacionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoriasRecursosInformacion::class);
    }

//    /**
//     * @return CategoriasRecursosInformacion[] Returns an array of CategoriasRecursosInformacion objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoriasRecursosInformacion
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
