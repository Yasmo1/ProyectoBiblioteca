<?php

namespace App\Repository;

use App\Entity\OrganismosPostgrado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OrganismosPostgrado|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrganismosPostgrado|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrganismosPostgrado[]    findAll()
 * @method OrganismosPostgrado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganismosPostgradoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrganismosPostgrado::class);
    }

//    /**
//     * @return OrganismosPostgrado[] Returns an array of OrganismosPostgrado objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrganismosPostgrado
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
