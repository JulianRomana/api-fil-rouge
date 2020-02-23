<?php

namespace App\Repository;

use App\Entity\UserQuest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserQuest|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserQuest|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserQuest[]    findAll()
 * @method UserQuest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserQuestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserQuest::class);
    }

     /**
     * @return UserQuest[] Returns an array of UserQuest objects
     */

    public function findAllQuestsById($id)
    {
        return $this->createQueryBuilder('getAllQuests')
            ->where('getAllQuests.user_id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }

    public function setAllQuests($value): ?UserQuest
    {
        return $this->createQueryBuilder('postQuest')
            ->andWhere('postQuest.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
