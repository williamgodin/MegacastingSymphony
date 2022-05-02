<?php

namespace App\Entity;

use App\Repository\PostulerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostulerRepository::class)
 */
class Postuler
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\ManyToOne(targetEntity="Personne", inversedBy="Postulations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantPersonne", referencedColumnName="Id_Personne")
     * })
     */
    private $Personne;

    /**
     * @ORM\ManyToOne(targetEntity="Casting", inversedBy="Postulations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identifiantCasting", referencedColumnName="Id_Casting",nullable=true)
     * })
     */
    private $Casting;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datePostulation;

    public function __construct()
    {
        $this->Casting = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonne(): ?Personne
    {
        return $this->personne;
    }

    public function setPersonne(?Personne $personne): self
    {
        $this->personne = $personne;

        return $this;
    }

    public function getCasting(): ?Casting
    {
        return $this->Casting;
    }

    public function setCasting(?Casting $casting): self
    {
        $this->Casting = $casting;
        return $this;
    }

    public function getDatePostulation(): ?\DateTimeInterface
    {
        return $this->datePostulation;
    }

    public function setDatePostulation(\DateTimeInterface $datePostulation): self
    {
        $this->datePostulation = $datePostulation;

        return $this;
    }
}
