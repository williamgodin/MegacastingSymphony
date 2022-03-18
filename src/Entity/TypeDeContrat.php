<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeDeContrat
 *
 * @ORM\Table(name="Type_de_contrat")
 * @ORM\Entity
 */
class TypeDeContrat
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Contrat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle", type="string", length=50, nullable=false)
     */
    private $libelle;

    public function getIdContrat(): ?int
    {
        return $this->idContrat;
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
