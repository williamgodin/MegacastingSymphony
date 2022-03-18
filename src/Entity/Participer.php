<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participer
 *
 * @ORM\Table(name="Participer")
 * @ORM\Entity
 */
class Participer
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Casting", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idCasting;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Artiste", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idArtiste;


}
