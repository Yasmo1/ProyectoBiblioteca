<?php

namespace App\Repository;

use App\Entity\TipoActividadPostgrado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TipoActividadPostgrado|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoActividadPostgrado|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoActividadPostgrado[]    findAll()
 * @method TipoActividadPostgrado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoActividadPostgradoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TipoActividadPostgrado::class);
    }

//    /**
//     * @return TipoActividadPostgrado[] Returns an array of TipoActividadPostgrado objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoActividadPostgrado
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
