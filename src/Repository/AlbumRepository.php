<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class AlbumRepository extends EntityRepository
{
    public function findAllSortedByNameQB()
    {
        return $this->createQueryBuilder('a')
                ->orderBy('a.title', 'ASC')
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