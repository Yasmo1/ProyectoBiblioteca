<?php

namespace App\Repository;

use App\Entity\Quienreserva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Quienreserva|null find($id, $lockMode = null, $lockVersion = null)
 * @method Quienreserva|null findOneBy(array $criteria, array $orderBy = null)
 * @method Quienreserva[]    findAll()
 * @method Quienreserva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuienreservaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Quienreserva::class);
    }

    public function getReservas_Ocupada($horaInicio,$horafin,$sala)
    {
        $em = $this->getEntityManager();
        $dql = "select a from App:Quienreserva a
        where (a.horainicio<=:horainicio and a.horafin>:horainicio) or (a.horainicio<:horafin and a.horafin>=:horafin) or (a.horainicio>=:horainicio and a.horafin<=:horafin) and a.sala=:sala";
        $query = $em->createQuery($dql);
        $query->setParameter('horainicio', $horaInicio);
        $query->setParameter('horafin', $horafin);
        $query->setParameter('sala', $sala);
        $articulos = $query->getResult();

        $i = 0;

        foreach($articulos as $articulo)
        {
            if($i != 0)
                return true;
            $i++;
        }

        return false;
    }

//    /**
//     * @return Quienreserva[] Returns an array of Quienreserva objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Quienreserva
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
