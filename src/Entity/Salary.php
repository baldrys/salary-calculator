<?php

namespace App\Entity;

use App\Repository\SalaryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Salary as SalaryAssert;

/**
 * @ORM\Entity(repositoryClass=SalaryRepository::class)
 * @SalaryAssert
 */
class Salary
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $baseRate;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $realRate;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":"0"})
     */
    private $mortgage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBaseRate(): ?float
    {
        return $this->baseRate;
    }

    public function setBaseRate(float $baseRate): self
    {
        $this->baseRate = $baseRate;

        return $this;
    }

    public function getRealRate(): ?float
    {
        return $this->realRate;
    }

    public function setRealRate(?float $realRate): self
    {
        $this->realRate = $realRate;

        return $this;
    }

    public function getMortgage(): ?bool
    {
        return $this->mortgage;
    }

    public function setMortgage(float $mortgage): self
    {
        $this->mortgage = $mortgage;

        return $this;
    }

    /**
     * @Assert\IsTrue(message="Заработная плата не может быть меньше 40000 руб.")
     */
    public function isBaseRateSafe()
    {
        if ($this->mortgage === true && $this->baseRate < 40000)
            return false;
        return true;
    }
}
