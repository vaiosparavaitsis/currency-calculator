<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="currencies")
 * @ORM\Entity(repositoryClass=CurrencyRepository::class)
 */
class Currency
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nameFrom;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nameTo;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"nameFrom", "nameTo"}, unique=true)
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=19, scale=4)
     */
    private $ratio;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNameFrom(): string
    {
        return $this->nameFrom;
    }

    /**
     * @param string $nameFrom
     */
    public function setNameFrom(string $nameFrom): void
    {
        $this->nameFrom = $nameFrom;
    }

    /**
     * @return string
     */
    public function getNameTo(): string
    {
        return $this->nameTo;
    }

    /**
     * @param string $nameTo
     */
    public function setNameTo(string $nameTo): void
    {
        $this->nameTo = $nameTo;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return float
     */
    public function getRatio(): float
    {
        return $this->ratio;
    }

    /**
     * @param float $ratio
     */
    public function setRatio(float $ratio): void
    {
        $this->ratio = $ratio;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->nameFrom . ' to ' . $this->nameTo;
    }
}
