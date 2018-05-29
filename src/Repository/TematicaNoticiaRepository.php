<?php

namespace App\Repository;

use App\Entity\TematicaNoticia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TematicaNoticia|null find($id, $lockMode = null, $lockVersion = null)
 * @method TematicaNoticia|null findOneBy(array $criteria, array $orderBy = null)
 * @method TematicaNoticia[]    findAll()
 * @method TematicaNoticia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TematicaNoticiaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TematicaNoticia::class);
    }

//    /**
//     * @return TematicaNoticia[] Returns an array of TematicaNoticia objects
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
    public function findOneBySomeField($value): ?TematicaNoticia
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
