<?php

namespace App\Repository;

use App\Entity\Investigaciones;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Investigaciones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Investigaciones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Investigaciones[]    findAll()
 * @method Investigaciones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvestigacionesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Investigaciones::class);
    }

//    /**
//     * @return Investigaciones[] Returns an array of Investigaciones objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Investigaciones
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
