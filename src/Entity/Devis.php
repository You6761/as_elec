<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $clientNom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $clientEmail = null;

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank]
    private ?string $descriptionTravaux = null;

    #[ORM\Column(type: "decimal", scale: 2)]
    private ?float $montant = null;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $dateCreation;

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
    }

    // Getters et Setters...
}
