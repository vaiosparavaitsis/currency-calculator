<?php

namespace App\Repository;

use App\Entity\Currency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Currency|null find($id, $lockMode = null, $lockVersion = null)
 * @method Currency|null findOneBy(array $criteria, array $orderBy = null)
 * @method Currency[]    findAll()
 * @method Currency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Currency::class);
    }

    /**
     * @return Currency[]|mixed
     */
    public function getCurrencies()
    {
        return $this
            ->getEntityManager()
            ->createQueryBuilder()
            ->select('c')
            ->from(Currency::class, 'c')
            ->addOrderBy('c.nameFrom', Criteria::ASC)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $id
     * @return Currency|mixed
     */
    public function getCurrencyById($id)
    {
        try {
            $result = $this
                ->getEntityManager()
                ->createQueryBuilder()
                ->select('c')
                ->from(Currency::class, 'c')
                ->where('c.id = :id')
                ->setParameter('id', $id)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (\Exception $exception) {
            $result = null;
        }

        return $result;
    }

    /**
     * @param string $slug
     * @return Currency|mixed
     */
    public function getCurrencyBySlug(string $slug)
    {
        try {
            $result = $this
                ->getEntityManager()
                ->createQueryBuilder()
                ->select('c')
                ->from(Currency::class, 'c')
                ->where('c.slug = :slug')
                ->setParameter('slug', $slug)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (\Exception $exception) {
            $result = null;
        }

        return $result;
    }
}
