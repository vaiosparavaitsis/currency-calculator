<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @package App\Repository
 */
abstract class BaseRepository extends ServiceEntityRepository
{
  /**
   * @param ManagerRegistry $registry
   * @param $entity
   */
  public function __construct(ManagerRegistry $registry, $entity)
  {
    parent::__construct($registry, $entity);
  }
}
