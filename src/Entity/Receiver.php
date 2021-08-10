<?php

namespace App\Entity;

use App\Repository\ReceiverRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReceiverRepository::class)
 */
class Receiver
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $receiver_uuid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $receiverFirstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $receiverLastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $receiverCountryCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReceiverUuid(): ?string
    {
        return $this->receiver_uuid;
    }

    public function setReceiverUuid(?string $receiver_uuid): self
    {
        $this->receiver_uuid = $receiver_uuid;

        return $this;
    }

    public function getReceiverFirstname(): ?string
    {
        return $this->receiverFirstname;
    }

    public function setReceiverFirstname(?string $receiverFirstname): self
    {
        $this->receiverFirstname = $receiverFirstname;

        return $this;
    }

    public function getReceiverLastname(): ?string
    {
        return $this->receiverLastname;
    }

    public function setReceiverLastname(?string $receiverLastname): self
    {
        $this->receiverLastname = $receiverLastname;

        return $this;
    }

    public function getReceiverCountryCode(): ?string
    {
        return $this->receiverCountryCode;
    }

    public function setReceiverCountryCode(?string $receiverCountryCode): self
    {
        $this->receiverCountryCode = $receiverCountryCode;

        return $this;
    }
}
