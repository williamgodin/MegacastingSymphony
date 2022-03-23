<?php
namespace App\Entity;

class Application
{
    protected int $castingIdentifier;
    protected string $firstname;
    protected string $lastname;
    protected string $email;
    protected string $motivation;
    protected string $sexe;
    protected \DateTime $applicationDate;
    protected \DateTime $birthDate;

    /**
     * @return int
     */
    public function getCastingIdentifier(): int
    {
        return $this->castingIdentifier;
    }

    /**
     * @param int $castingIdentifier
     */
    public function setCastingIdentifier(int $castingIdentifier): void
    {
        $this->castingIdentifier = $castingIdentifier;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMotivation(): string
    {
        return $this->motivation;
    }

    /**
     * @param string $motivation
     */
    public function setMotivation(string $motivation): void
    {
        $this->motivation = $motivation;
    }

    /**
     * @return string
     */
    public function getSexe(): string
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     */
    public function setSexe(string $sexe): void
    {
        $this->sexe = $sexe;
    }

    /**
     * @return \DateTime
     */
    public function getApplicationDate(): \DateTime
    {
        return $this->applicationDate;
    }

    /**
     * @param \DateTime $applicationDate
     */
    public function setApplicationDate(\DateTime $applicationDate): void
    {
        $this->applicationDate = $applicationDate;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate(\DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }
}