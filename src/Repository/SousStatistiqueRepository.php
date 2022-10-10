<?php

namespace App\Repository;

use App\Entity\SousStatistique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SousStatistique>
 *
 * @method SousStatistique|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousStatistique|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousStatistique[]    findAll()
 * @method SousStatistique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousStatistiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousStatistique::class);
    }

    public function add(SousStatistique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SousStatistique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return SousStatistique[] Returns an array of SousStatistique objects
    */
   public function findGroupByStat(): array
   {
       return $this->createQueryBuilder('s')
           ->groupBy('s.stat')
           ->getQuery()
           ->getResult()
       ;
   }

//    public function findOneBySomeField($value): ?SousStatistique
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
