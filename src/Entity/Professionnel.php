<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Professionnel extends Personne
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loginlourd;


    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $passwordlourd;

    /**
     * @return mixed
     */
    public function getLoginlourd()
    {
        return $this->loginlourd;
    }

    /**
     * @param mixed $loginlourd
     */
    public function setLoginlourd($loginlourd): void
    {
        $this->loginlourd = $loginlourd;
    }

    /**
     * @return string
     */
    public function getPasswordlourd(): string
    {
        return $this->passwordlourd;
    }

    /**
     * @param string $passwordlourd
     */
    public function setPasswordlourd(string $passwordlourd): void
    {
        $this->passwordlourd = $passwordlourd;
    }


}
