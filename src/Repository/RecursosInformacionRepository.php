<?php

namespace App\Repository;

use App\Entity\RecursosInformacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RecursosInformacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecursosInformacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecursosInformacion[]    findAll()
 * @method RecursosInformacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecursosInformacionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RecursosInformacion::class);
    }

//    /**
//     * @return RecursosInformacion[] Returns an array of RecursosInformacion objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecursosInformacion
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
