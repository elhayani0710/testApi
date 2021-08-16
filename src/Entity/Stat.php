<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\StatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
class Stat
{
    #[ApiProperty(identifier: true)]
    private $idStock;
    private $giftCount;
    private $countryCount;
    private $priceAvg;
    private $priceMin;
    private $priceMax;

    public function __construct($idStock,$giftCount, $countryCount, $priceAvg, $priceMin, $priceMax)
    {
        $this->idStock = $idStock;
        $this->giftCount = $giftCount;
        $this->countryCount = $countryCount;
        $this->priceAvg = $priceAvg;
        $this->priceMin = $priceMin;
        $this->priceMax = $priceMax;
    }

    public function getIdStock(): ?int
    {
        return $this->idStock;
    }

    public function getGiftCount(): ?int
    {
        return $this->giftCount;
    }

    public function setGiftCount(int $giftCount): self
    {
        $this->giftCount = $giftCount;

        return $this;
    }

    public function getCountryCount(): ?int
    {
        return $this->countryCount;
    }

    public function setCountryCount(?int $countryCount): self
    {
        $this->countryCount = $countryCount;

        return $this;
    }

    public function getPriceAvg(): ?float
    {
        return $this->priceAvg;
    }

    public function setPriceAvg(?float $priceAvg): self
    {
        $this->priceAvg = $priceAvg;

        return $this;
    }

    public function getPriceMin(): ?float
    {
        return $this->priceMin;
    }

    public function setPriceMin(?float $priceMin): self
    {
        $this->priceMin = $priceMin;

        return $this;
    }

    public function getPriceMax(): ?float
    {
        return $this->priceMax;
    }

    public function setPriceMax(?float $priceMax): self
    {
        $this->priceMax = $priceMax;

        return $this;
    }
}
