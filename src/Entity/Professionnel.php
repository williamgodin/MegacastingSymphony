<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Professionnel
 *
 * @ORM\Table(name="Professionnel")
 * @ORM\Entity
 */
class Professionnel
{
    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Personne", referencedColumnName="Id_Personne")
     * })
     */
    private $idPersonne;


}
