<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Métier
 *
 * @ORM\Table(name="Métier", indexes={@ORM\Index(name="IDX_572112AC80E84B86", columns={"Id_Domaine_metier"})})
 * @ORM\Entity
 */
class Métier
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Metier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMetier;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    /**
     * @var \DomaineDeMétier
     *
     * @ORM\ManyToOne(targetEntity="DomaineDeMétier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Domaine_metier", referencedColumnName="Id_Domaine_metier")
     * })
     */
    private $DomaineMetier;

    public function getIdMetier(): ?int
    {
        return $this->idMetier;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDomaineMetier(): ?DomaineDeMétier
    {
        return $this->DomaineMetier;
    }

    public function setDomaineMetier(?DomaineDeMétier $DomaineMetier): self
    {
        $this->DomaineMetier = $DomaineMetier;

        return $this;
    }


}
