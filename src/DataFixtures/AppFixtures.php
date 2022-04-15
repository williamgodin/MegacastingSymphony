<?php

namespace App\DataFixtures;

use App\Entity\Civilite;
use App\Entity\Artiste;
use App\Entity\Casting;
use App\Entity\Métier;
use App\Entity\Professionnel;
use App\Entity\TypeDeContrat;
use App\Entity\DomaineDeMétier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\TypeResolver;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher  = $hasher;
    }
    public function load(ObjectManager $manager): void
    {
        $civ1 = new Civilite();
        $civ1->setGenre("Monsieur");

        $civ2 = new Civilite();
        $civ2->setGenre("Madame");

        $civ3 = new Civilite();
        $civ3->setGenre("Mademoiselle");

        $manager->persist($civ1);
        $manager->persist($civ2);
        $manager->persist($civ3);

        $i = 0;

        for ($i; $i < 10 ; $i++){
            $artiste = new Artiste();
            $artiste->setCivilite($civ1);
            $password= $this->hasher->hashPassword($artiste, 'Test9*');
            $artiste->setPassword($password);
            $artiste->setLogin("login");
            $nom = str_repeat(chr(65+$i), 10);
            $artiste->setNom($nom);
            $artiste->SetPrenom(strtolower($nom));
            $artiste->SetEmail(strtolower($nom."@test.com"));
            $artiste->setVille(strtolower("ville"));
            $artiste->setAdresse(strtolower("Adresse de la personne"));
            $manager->persist($artiste);



        }
        $contrat1 = new TypeDeContrat();
        $contrat1->setLibelle("CDD");
        $manager->persist($contrat1);

        $contrat2 = new TypeDeContrat();
        $contrat2->setLibelle("CDI");
        $manager->persist($contrat2);

        $domaine = new DomaineDeMétier();
        $domaine->setLibelle("Cinéma");
        $manager->persist($domaine);

        $metier = new Métier();
        $metier->setLibelle("Acteur");
        $metier->setDomaineMetier($domaine);
        $manager->persist($metier);

        $professionnel1 = new Professionnel();
        $professionnel1->setLoginlourd("loginpro1");
        $professionnel1->setPasswordlourd("Not24get");
        $professionnel1->setCivilite($civ1);
        $professionnel1->setNom("professionnel 1");
        $professionnel1->SetPrenom("professionneleu 1");
        $professionnel1->SetEmail(strtolower("pro1@test.com"));
        $professionnel1->setVille(strtolower("ville"));
        $professionnel1->setAdresse(strtolower("Adresse de la personne"));
        $manager->persist($professionnel1);

        $casting = new Casting();
        $casting->setIntitule("Casting acteur");
        $casting->setReference(271);
        $casting->setDateDebutPublication(new \DateTime("now"));
        $casting->setNbrPoste(3);
        $casting->setLocalisation("Laval");
        $casting->setDescriptionPoste("ceci est la description du poste");
        $casting->setDescriptionProfil("ceci est la description du profil");
        $casting->setCoordonnees("02.38.93.04.56");
        $casting->setDureeDiffusion(new \DateTime('2022-06-20'));
        $casting->setContrat($contrat1);
        $casting->setMetier($metier);
        $casting->setProfessionnel($professionnel1);
        $manager->persist($casting);










        $manager->flush();
    }
}
