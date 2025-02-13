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
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $mailClient = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $adresse = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank]
    #[Assert\Regex('/^\d+$/', message: "Le numéro de téléphone doit contenir uniquement des chiffres.")]
    private ?string $numero = null;

    #[ORM\Column(type: "text")]
    #[Assert\NotBlank]
    private ?string $descriptionTravaux = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    private ?string $typeHabitat = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    private ?string $estimationTravaux = null;

    #[ORM\Column(type: "text", nullable: true)]
    private ?string $plusDeDetails = null;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $dateCreation;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $devis;

    public function getmailClient(): ?string
    {
        return $this->mailClient;
    }
    public function setmailClient(string $mailClient): self
    {
        $this->mailClient = $mailClient;
        return $this;
    }

    public function __construct()
    {
        $this->dateCreation = new \DateTime();
    }

    // Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }
    public function setVille(string $ville): self
    {
        $this->ville = $ville;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }
    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }
    public function setNumero(string $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getDescriptionTravaux(): ?string
    {
        return $this->descriptionTravaux;
    }
    public function setDescriptionTravaux(string $descriptionTravaux): self
    {
        $this->descriptionTravaux = $descriptionTravaux;
        return $this;
    }

    public function getTypeHabitat(): ?string
    {
        return $this->typeHabitat;
    }
    public function setTypeHabitat(string $typeHabitat): self
    {
        $this->typeHabitat = $typeHabitat;
        return $this;
    }

    public function getEstimationTravaux(): ?string
    {
        return $this->estimationTravaux;
    }
    public function setEstimationTravaux(string $estimationTravaux): self
    {
        $this->estimationTravaux = $estimationTravaux;
        return $this;
    }

    public function getPlusDeDetails(): ?string
    {
        return $this->plusDeDetails;
    }
    public function setPlusDeDetails(?string $plusDeDetails): self
    {
        $this->plusDeDetails = $plusDeDetails;
        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }
}
