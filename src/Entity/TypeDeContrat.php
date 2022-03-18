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


}
