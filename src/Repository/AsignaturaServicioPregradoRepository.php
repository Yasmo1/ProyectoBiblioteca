<?php

namespace App\Repository;

use App\Entity\AsignaturaServicioPregrado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AsignaturaServicioPregrado|null find($id, $lockMode = null, $lockVersion = null)
 * @method AsignaturaServicioPregrado|null findOneBy(array $criteria, array $orderBy = null)
 * @method AsignaturaServicioPregrado[]    findAll()
 * @method AsignaturaServicioPregrado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AsignaturaServicioPregradoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AsignaturaServicioPregrado::class);
    }

//    /**
//     * @return AsignaturaServicioPregrado[] Returns an array of AsignaturaServicioPregrado objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AsignaturaServicioPregrado
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
