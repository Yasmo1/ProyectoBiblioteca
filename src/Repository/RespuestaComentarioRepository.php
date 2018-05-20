<?php

namespace App\Repository;

use App\Entity\RespuestaComentario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RespuestaComentario|null find($id, $lockMode = null, $lockVersion = null)
 * @method RespuestaComentario|null findOneBy(array $criteria, array $orderBy = null)
 * @method RespuestaComentario[]    findAll()
 * @method RespuestaComentario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RespuestaComentarioRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RespuestaComentario::class);
    }

//    /**
//     * @return RespuestaComentario[] Returns an array of RespuestaComentario objects
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
    public function findOneBySomeField($value): ?RespuestaComentario
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
