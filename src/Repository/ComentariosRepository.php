<?php

namespace App\Repository;

use App\Entity\Comentarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Comentarios|null find($id, $lockMode = null, $lockVersion = null)
 * @method Comentarios|null findOneBy(array $criteria, array $orderBy = null)
 * @method Comentarios[]    findAll()
 * @method Comentarios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComentariosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comentarios::class);
    }

    public function getPaginatePosts($pageSize=5,$currentPage,$noticia_id)
    {
        $em=$this->getEntityManager();

        //Consulta DQL
        //$dql = "SELECT p FROM Biblioteca\BibliotecaBundle\Entity\Comentarios p ORDER BY p.id DESC";
        $dqlmio = "SELECT p FROM App\Entity\Comentarios p
                    WHERE p.noticia_id = :noticia AND p.publicado = :publicado
                  ORDER BY p.id DESC";
        $query = $em->createQuery($dqlmio)->setParameters(
            array(
                '$noticia_id' => $noticia_id,
                'publicado' => 1,
            )
        )
            ->setFirstResult($pageSize * ($currentPage - 1))
            ->setMaxResults($pageSize);

        $paginator = new Paginator($query, $fetchJoinCollection = true);

        return $paginator;
    }

//    /**
//     * @return Comentarios[] Returns an array of Comentarios objects
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
    public function findOneBySomeField($value): ?Comentarios
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
