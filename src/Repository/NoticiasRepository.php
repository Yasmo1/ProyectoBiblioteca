<?php

namespace App\Repository;

use App\Entity\Noticias;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Noticias|null find($id, $lockMode = null, $lockVersion = null)
 * @method Noticias|null findOneBy(array $criteria, array $orderBy = null)
 * @method Noticias[]    findAll()
 * @method Noticias[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoticiasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Noticias::class);
    }

//    /**
//     * @return Noticias[] Returns an array of Noticias objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Noticias
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getPublicNewsViejos()
    {
        $query = $this->createQueryBuilder('n')
            ->where('n.publica = :publica')
            ->setParameter('publica', 1)
            ->getQuery();
        return $query->getResult();
    }

    public function getPublicNews()
    {
        $query = $this->createQueryBuilder('n')
            ->where('n.publica = :publica')
            ->setParameter('publica', 1)
            ->orderBy('n.id', 'DESC')
            ->getQuery();
        return $query->getResult();
    }
    public function getPortadaNews()
    {
        $query = $this->createQueryBuilder('n')
            ->where('n.publica = :publica')
            ->andWhere('n.portada = :portada')
            ->setParameter('publica', 1)
            ->setParameter('portada', 1)
            ->orderBy('n.id', 'DESC')
            ->getQuery();
        return $query->getResult();
    }
    public function getLastUpdate()
    {
        $query = $this->createQueryBuilder('n')
            ->where('n.publica = :publica')
            ->setParameter('publica', 1)
            ->orderBy('n.fecha','DESC')
            ->getQuery();
        $result= $query->getArrayResult();
        return $result[0]['fecha'];
    }
}
