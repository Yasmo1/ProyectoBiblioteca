<?php

namespace App\Repository;

use App\Entity\ActividadPostgrado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query;

/**
 * @method ActividadPostgrado|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActividadPostgrado|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActividadPostgrado[]    findAll()
 * @method ActividadPostgrado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActividadPostgradoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ActividadPostgrado::class);
    }

    public function PostgradoDESC()
    {
        $em=$this->getEntityManager();
        $value = 1;
        $dqlmio = "SELECT a FROM App\Entity\ActividadPostgrado a ORDER BY a.fechainicio DESC";
        $query = $em->createQuery($dqlmio);

        $elements= $query->getResult(Query::HYDRATE_ARRAY);
        $result = array();
        $i = 0;
        foreach ($elements as $element){
            $result[$i++] =  $element;
        }
        return $result;

    }

//    /**
//     * @return ActividadPostgrado[] Returns an array of ActividadPostgrado objects
//     */

    /*public function findByfechainicio($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'DSC')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult()
        ;
    }*/


    /*
    public function findOneBySomeField($value): ?ActividadPostgrado
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
