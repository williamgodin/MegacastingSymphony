<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\InheritanceType;

/**
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"personne" = "Personne", "artiste" = "Artiste","professionnel" = "Professionnel"})
 */
class Personne
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Personne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPersonne;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=50, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=50, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=50, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Telephone", type="string", length=50, nullable=true)
     */
    private $telephone;

    /**
     * @var \Civilité
     *
     * @ORM\ManyToOne(targetEntity="Civilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Civilite", referencedColumnName="Id_Civilite",nullable=false)
     * })
     */
    private $Civilite;

    public function getIdPersonne(): ?int
    {
        return $this->idPersonne;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCivilite(): ?Civilite
    {
        return $this->Civilite;
    }

    public function setCivilite(?Civilite $Civilite): self
    {
        $this->Civilite = $Civilite;

        return $this;
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Casting", inversedBy="artistes")
     * @ORM\JoinTable(name="Participer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Id_Personne", referencedColumnName="Id_Personne")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Id_Casting", referencedColumnName="Id_Casting")
     *   }
     * )
     */
    private $castings;

    /**
     * @ORM\OneToMany(targetEntity=Postuler::class, mappedBy="Personne", orphanRemoval=true)
     */
    private $Postulations;

    public function __construct()
    {
        $this->Postulations = new ArrayCollection();
    }

    /**
     * @return Collection<int, Postuler>
     */
    public function getPostulations(): Collection
    {
        return $this->Postulations;
    }

    public function addPostulation(Postuler $postulation): self
    {
        if (!$this->Postulations->contains($postulation)) {
            $this->Postulations[] = $postulation;
            $postulation->setPersonne($this);
        }

        return $this;
    }

    public function removePostulation(Postuler $postulation): self
    {
        if ($this->Postulations->removeElement($postulation)) {
            // set the owning side to null (unless already changed)
            if ($postulation->getPersonne() === $this) {
                $postulation->getPersonne(null);
            }
        }

        return $this;
    }



}
