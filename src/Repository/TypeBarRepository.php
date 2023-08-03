<?php

namespace App\Repository;

use App\Entity\TypeBar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeBar>
 *
 * @method TypeBar|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBar|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBar[]    findAll()
 * @method TypeBar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeBar::class);
    }

//    /**
//     * @return TypeBar[] Returns an array of TypeBar objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeBar
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
