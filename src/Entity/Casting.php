<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Casting
 *
 * @ORM\Table(name="Casting", indexes={@ORM\Index(name="IDX_1EA683CC3E490AAF", columns={"Id_Contrat"}), @ORM\Index(name="IDX_1EA683CCF2CA3FF4", columns={"Id_Metier"}), @ORM\Index(name="IDX_1EA683CC604120E2", columns={"Id_Professionnel"})})
 * @ORM\Entity
 */
class Casting
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Casting", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCasting;

    /**
     * @var string
     *
     * @ORM\Column(name="Intitule", type="string", length=50, nullable=false)
     */
    private $intitule;

    /**
     * @var int
     *
     * @ORM\Column(name="Reference", type="integer", nullable=false)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_debut_publication", type="datetime", nullable=false)
     */
    private $dateDebutPublication;

    /**
     * @var int
     *
     * @ORM\Column(name="Nbr_poste", type="integer", nullable=false)
     */
    private $nbrPoste;

    /**
     * @var string
     *
     * @ORM\Column(name="Localisation", type="string", length=50, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_poste", type="string", length=250, nullable=false)
     */
    private $descriptionPoste;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_profil", type="string", length=250, nullable=false)
     */
    private $descriptionProfil;

    /**
     * @var string
     *
     * @ORM\Column(name="Coordonnees", type="string", length=250, nullable=false)
     */
    private $coordonnees;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Duree_diffusion", type="datetime", nullable=false)
     */
    private $dureeDiffusion;

    /**
     * @var \TypeDeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeDeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Contrat", referencedColumnName="Id_Contrat",nullable=false)
     * })
     */
    private $Contrat;

    /**
     * @var \Métier
     *
     * @ORM\ManyToOne(targetEntity="Métier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Metier", referencedColumnName="Id_Metier",nullable=false)
     * })
     */
    private $Metier;

    /**
     * @var \Professionnel
     *
     * @ORM\ManyToOne(targetEntity="Professionnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Professionnel", referencedColumnName="Id_Personne",nullable=false)
     * })
     */
    private $Professionnel;

    public function getIdCasting(): ?int
    {
        return $this->idCasting;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getDateDebutPublication(): ?\DateTimeInterface
    {
        return $this->dateDebutPublication;
    }

    public function setDateDebutPublication(\DateTimeInterface $dateDebutPublication): self
    {
        $this->dateDebutPublication = $dateDebutPublication;

        return $this;
    }

    public function getNbrPoste(): ?int
    {
        return $this->nbrPoste;
    }

    public function setNbrPoste(int $nbrPoste): self
    {
        $this->nbrPoste = $nbrPoste;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getDescriptionPoste(): ?string
    {
        return $this->descriptionPoste;
    }

    public function setDescriptionPoste(string $descriptionPoste): self
    {
        $this->descriptionPoste = $descriptionPoste;

        return $this;
    }

    public function getDescriptionProfil(): ?string
    {
        return $this->descriptionProfil;
    }

    public function setDescriptionProfil(string $descriptionProfil): self
    {
        $this->descriptionProfil = $descriptionProfil;

        return $this;
    }

    public function getCoordonnees(): ?string
    {
        return $this->coordonnees;
    }

    public function setCoordonnees(string $coordonnees): self
    {
        $this->coordonnees = $coordonnees;

        return $this;
    }

    public function getDureeDiffusion(): ?\DateTimeInterface
    {
        return $this->dureeDiffusion;
    }

    public function setDureeDiffusion(\DateTimeInterface $dureeDiffusion): self
    {
        $this->dureeDiffusion = $dureeDiffusion;

        return $this;
    }

    public function getContrat(): ?TypeDeContrat
    {
        return $this->Contrat;
    }

    public function setContrat(?TypeDeContrat $Contrat): self
    {
        $this->Contrat = $Contrat;

        return $this;
    }

    public function getMetier(): ?Métier
    {
        return $this->Metier;
    }

    public function setMetier(?Métier $Metier): self
    {
        $this->Metier = $Metier;

        return $this;
    }

    public function getProfessionnel(): ?Professionnel
    {
        return $this->Professionnel;
    }

    public function setProfessionnel(?Professionnel $Professionnel): self
    {
        $this->Professionnel = $Professionnel;

        return $this;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Artiste", inversedBy="castings",mappedBy="idPersonne")
     */
    private $artistes;

    /**
     * @ORM\ManyToOne(targetEntity=Postuler::class, inversedBy="Casting")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Postulations;

    public function getPostulations(): ?Postuler
    {
        return $this->Postulations;
    }

    public function setPostulations(?Postuler $Postulations): self
    {
        $this->Postulations = $Postulations;

        return $this;
    }

}
