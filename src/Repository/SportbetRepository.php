<?php

namespace App\Repository;

use App\Entity\Sportbet;
use App\Entity\FootballMatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;


/**
 * @extends ServiceEntityRepository<Sportbet>
 *
 * @method Sportbet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sportbet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sportbet[]    findAll()
 * @method Sportbet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportbetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sportbet::class);
    }

    public function save(Sportbet $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Sportbet $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function countUsersByMatch($matchId)
    {
        try {
            return $this->createQueryBuilder('sb')
                ->select('count(sb.user) as userCount')
                ->where('sb.footballMatch = :matchId')
                ->setParameter('matchId', $matchId)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
            // Handle the exception, e.g. log it, rethrow it, or return a default value
        } catch (NoResultException $e) {
            return 0;  // No users bet on this match
        }
    }

    public function countUsersByTeamInMatch($matchId, $teamId)
    {
        try {
            return $this->createQueryBuilder('sb')
                ->select('count(sb.user) as userCount')
                ->where('sb.footballMatch = :matchId')
                ->andWhere('sb.team = :teamId')
                ->setParameter('matchId', $matchId)
                ->setParameter('teamId', $teamId)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
            // Handle the exception, e.g. log it, rethrow it, or return a default value
        } catch (NoResultException $e) {
            return 0;  // No users bet on this team in this match
        }
    }

    /**
     * @return Sportbet[] Returns an array of Sportbet objects in function of One footballmatch
     */
    public function findBetsForMatch(FootballMatch $match)
    {
        return $this->createQueryBuilder('sb')
            ->andWhere('sb.match = :match')
            ->setParameter('match', $match)
            ->getQuery()
            ->getResult();
    }





//    /**
//     * @return Sportbet[] Returns an array of Sportbet objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Sportbet
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
