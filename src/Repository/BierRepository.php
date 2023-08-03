<?php

namespace App\Repository;

use App\Entity\Bier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bier>
 *
 * @method Bier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bier[]    findAll()
 * @method Bier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bier::class);
    }

//    /**
//     * @return Bier[] Returns an array of Bier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bier
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
