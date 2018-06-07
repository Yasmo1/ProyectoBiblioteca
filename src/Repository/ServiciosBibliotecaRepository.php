<?php

namespace App\Repository;

use App\Entity\ServiciosBiblioteca;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ServiciosBiblioteca|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiciosBiblioteca|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiciosBiblioteca[]    findAll()
 * @method ServiciosBiblioteca[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiciosBibliotecaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ServiciosBiblioteca::class);
    }

//    /**
//     * @return ServiciosBiblioteca[] Returns an array of ServiciosBiblioteca objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiciosBiblioteca
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
