<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Civilité
 *
 * @ORM\Table(name="Civilité")
 * @ORM\Entity
 */
class Civilité
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Civilite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCivilite;

    /**
     * @var string
     *
     * @ORM\Column(name="Genre", type="string", length=50, nullable=false)
     */
    private $genre;


}
