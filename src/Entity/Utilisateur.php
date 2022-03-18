<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="Utilisateur")
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Identifiant", type="string", length=10, nullable=false, options={"fixed"=true})
     */
    private $identifiant;

    /**
     * @var bool
     *
     * @ORM\Column(name="Password", type="boolean", nullable=false)
     */
    private $password;


}
