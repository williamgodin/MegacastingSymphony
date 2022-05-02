<?php

namespace App\Repository;

use App\Entity\Casting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CastingRepository extends EntityRepository
{
    public function getPaginateCastings($page, $limit)
    {
        $query = $this->createQueryBuilder('o')
            ->setFirstResult(($page * $limit) - $limit)
            ->setMaxResults($limit);
        return $query
            ->getQuery()
            ->getResult();
    }

    public function getTotalCastings()
    {
        $query = $this->createQueryBuilder('o')
            ->select('COUNT(o)');
        return $query->getQuery()->getSingleScalarResult();
    }
}