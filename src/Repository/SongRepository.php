<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class SongRepository extends EntityRepository
{
    public function findAllSortedByNameQB()
    {
        return $this->createQueryBuilder('a')
                ->orderBy('a.name', 'ASC')
            ;
    }

    public function findAllSortedByNameQ()
    {
        return $this->findAllSortedByNameQB()->getQuery();
    }

    public function findAllSortedByName()
    {
        return $this->findAllSortedByNameQ()->getResult();
     }
}