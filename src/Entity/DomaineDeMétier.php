<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DomaineDeMétier
 *
 * @ORM\Table(name="Domaine_de_métier")
 * @ORM\Entity
 */
class DomaineDeMétier
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Domaine_metier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDomaineMetier;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    public function getIdDomaineMetier(): ?int
    {
        return $this->idDomaineMetier;
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


}
