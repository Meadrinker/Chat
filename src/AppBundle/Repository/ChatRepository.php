<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Chat;
use Doctrine\ORM\EntityRepository;

class ChatRepository extends EntityRepository {

    public function findLastId() {
        $result =  $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('c.id')
            ->setMaxResults(1)
            ->from(Chat::class, 'c')
            ->orderBy('c.id', 'DESC')
            ->getQuery()
            ->getOneOrNullResult();

        if ($result !== null) {
            return $result['id'];
        }

        return null;
    }

    public function selectFromLastId($lastId) {
        $results = $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('c')
            ->from(Chat::class, 'c')
            ->where('c.id > :lastId')
            ->setParameter('lastId', $lastId)
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();

        return $results;
    }

}