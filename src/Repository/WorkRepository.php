<?php

namespace App\Repository;

use App\Entity\Work;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Work|null find($id, $lockMode = null, $lockVersion = null)
 * @method Work|null findOneBy(array $criteria, array $orderBy = null)
 * @method Work[]    findAll()
 * @method Work[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Work::class);
    }

    /**
     * @return Work[] Returns an array of Work objects
     */

    public function findByTags($array)
    {
         $qb=$this->createQueryBuilder('w')
             ->select('w')
             ->leftJoin('w.tags','tags')
             ->addSelect('tags','w');
         if(is_iterable($array)){
            foreach ($array as $value) {
                $qb->andWhere(':val MEMBER OF w.tags')->setParameter('val', $value);
            }
        }else{
             $qb
             ->andWhere(':val MEMBER OF w.tags')->setParameter('val', $array);
         }
            return $qb->getQuery() ->getResult();

    }


    /*
    public function findOneBySomeField($value): ?Work
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
