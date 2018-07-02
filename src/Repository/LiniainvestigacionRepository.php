<?php

namespace App\Repository;

use App\Entity\Liniainvestigacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Liniainvestigacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Liniainvestigacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Liniainvestigacion[]    findAll()
 * @method Liniainvestigacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiniainvestigacionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Liniainvestigacion::class);
    }

//    /**
//     * @return Liniainvestigacion[] Returns an array of Liniainvestigacion objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Liniainvestigacion
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
