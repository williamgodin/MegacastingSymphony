<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Casting
 *
 * @ORM\Table(name="Casting", indexes={@ORM\Index(name="IDX_1EA683CC3E490AAF", columns={"Id_Contrat"}), @ORM\Index(name="IDX_1EA683CCF2CA3FF4", columns={"Id_Metier"}), @ORM\Index(name="IDX_1EA683CC604120E2", columns={"Id_Professionnel"})})
 * @ORM\Entity
 */
class Casting
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Casting", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCasting;

    /**
     * @var string
     *
     * @ORM\Column(name="Intitule", type="string", length=50, nullable=false)
     */
    private $intitule;

    /**
     * @var int
     *
     * @ORM\Column(name="Reference", type="integer", nullable=false)
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_debut_publication", type="datetime", nullable=false)
     */
    private $dateDebutPublication;

    /**
     * @var int
     *
     * @ORM\Column(name="Nbr_poste", type="integer", nullable=false)
     */
    private $nbrPoste;

    /**
     * @var string
     *
     * @ORM\Column(name="Localisation", type="string", length=50, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_poste", type="string", length=250, nullable=false)
     */
    private $descriptionPoste;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_profil", type="string", length=250, nullable=false)
     */
    private $descriptionProfil;

    /**
     * @var string
     *
     * @ORM\Column(name="Coordonnees", type="string", length=250, nullable=false)
     */
    private $coordonnees;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Duree_diffusion", type="datetime", nullable=false)
     */
    private $dureeDiffusion;

    /**
     * @var \TypeDeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeDeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Contrat", referencedColumnName="Id_Contrat")
     * })
     */
    private $Contrat;

    /**
     * @var \Métier
     *
     * @ORM\ManyToOne(targetEntity="Métier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Metier", referencedColumnName="Id_Metier")
     * })
     */
    private $Metier;

    /**
     * @var \Professionnel
     *
     * @ORM\ManyToOne(targetEntity="Professionnel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Professionnel", referencedColumnName="Id_Personne")
     * })
     */
    private $Professionnel;


}
