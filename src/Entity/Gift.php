<?php

namespace App\Entity;

use App\Repository\GiftRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GiftRepository::class)
 */
class Gift
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $giftUuid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $giftCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $giftDescription;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $giftPrice;

    /**
     * @ORM\ManyToOne(targetEntity=Stock::class, inversedBy="gifts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stock;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGiftUuid(): ?string
    {
        return $this->giftUuid;
    }

    public function setGiftUuid(string $giftUuid): self
    {
        $this->giftUuid = $giftUuid;

        return $this;
    }

    public function getGiftCode(): ?string
    {
        return $this->giftCode;
    }

    public function setGiftCode(string $giftCode): self
    {
        $this->giftCode = $giftCode;

        return $this;
    }

    public function getGiftDescription(): ?string
    {
        return $this->giftDescription;
    }

    public function setGiftDescription(?string $giftDescription): self
    {
        $this->giftDescription = $giftDescription;

        return $this;
    }

    public function getGiftPrice(): ?int
    {
        return $this->giftPrice;
    }

    public function setGiftPrice(?int $giftPrice): self
    {
        $this->giftPrice = $giftPrice;

        return $this;
    }

    public function getStock(): ?Stock
    {
        return $this->stock;
    }

    public function setStock(?Stock $stock): self
    {
        $this->stock = $stock;

        return $this;
    }
}
