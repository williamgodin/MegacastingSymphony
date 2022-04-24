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
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;
use Faker\Provider\fr_FR\Address;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;
    public function __construct(UserPasswordHasherInterface $hasher){
        $this->hasher  = $hasher;
    }
    public function load(ObjectManager $manager): void
    {


        //region Civilité
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
        //endregion

        //region Artiste
        for ($i=0; $i < 10 ; $i++){
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
        //endregion

        //region Contrat
        $contrat1 = new TypeDeContrat();
        $contrat1->setLibelle("CDD");
        $manager->persist($contrat1);

        $contrat2 = new TypeDeContrat();
        $contrat2->setLibelle("CDI");
        $manager->persist($contrat2);

        $contrats =[$contrat1,$contrat2];
        //endregion

        //region Domaine Métier
        $domaine1 = new DomaineDeMétier();
        $domaine1->setLibelle("Cinéma");
        $manager->persist($domaine1);

        $domaine2 = new DomaineDeMétier();
        $domaine2->setLibelle("Musique");
        $manager->persist($domaine2);

        $domaine3 = new DomaineDeMétier();
        $domaine3->setLibelle("Danse");
        $manager->persist($domaine3);

        $domaine4 = new DomaineDeMétier();
        $domaine4->setLibelle("Théatre");
        $manager->persist($domaine4);
        //endregion

        //region Métier
        $metier1 = new Métier();
        $metier1->setLibelle("Acteur");
        $metier1->setDomaineMetier($domaine1);
        $manager->persist($metier1);

        $metier2 = new Métier();
        $metier2->setLibelle("Cascadeur");
        $metier2->setDomaineMetier($domaine1);
        $manager->persist($metier2);

        $metier3 = new Métier();
        $metier3->setLibelle("Figurant");
        $metier3->setDomaineMetier($domaine1);
        $manager->persist($metier3);

        $metier4 = new Métier();
        $metier4->setLibelle("Musicien");
        $metier4->setDomaineMetier($domaine2);
        $manager->persist($metier4);

        $metier5 = new Métier();
        $metier5->setLibelle("DJ");
        $metier5->setDomaineMetier($domaine2);
        $manager->persist($metier5);

        $metier6 = new Métier();
        $metier6->setLibelle("Chanteur");
        $metier6->setDomaineMetier($domaine2);
        $manager->persist($metier6);

        $metier7 = new Métier();
        $metier7->setLibelle("Choriste");
        $metier7->setDomaineMetier($domaine2);
        $manager->persist($metier7);

        $metier8 = new Métier();
        $metier8->setLibelle("Danseur");
        $metier8->setDomaineMetier($domaine3);
        $manager->persist($metier8);

        $metier9 = new Métier();
        $metier9->setLibelle("Chorégraphe");
        $metier9->setDomaineMetier($domaine3);
        $manager->persist($metier9);

        $metier10 = new Métier();
        $metier10->setLibelle("Comédiens");
        $metier10->setDomaineMetier($domaine4);
        $manager->persist($metier10);

        $metier11 = new Métier();
        $metier11->setLibelle("Scénographe");
        $metier11->setDomaineMetier($domaine4);
        $manager->persist($metier11);

        $metier12 = new Métier();
        $metier12->setLibelle("Maquilleur");
        $metier12->setDomaineMetier($domaine4);
        $manager->persist($metier12);

        $metiers = [$metier1,$metier2,$metier3,$metier5,$metier5,$metier6,$metier7,$metier8,$metier9,$metier10,$metier11,$metier12];
        //endregion

        //region Professionnel
        $professionnel1 = new Professionnel();
        $professionnel1->setLoginlourd("loginpro1");
        $professionnel1->setPasswordlourd("Not24get");
        $professionnel1->setCivilite($civ1);
        $professionnel1->setNom("DUPONT");
        $professionnel1->SetPrenom("Albert");
        $professionnel1->SetEmail(strtolower("dalbert@gmail.com"));
        $professionnel1->setVille(strtolower("Vitré"));
        $professionnel1->setAdresse(strtolower("1 boulevard trapestine"));
        $manager->persist($professionnel1);

        $professionnel2 = new Professionnel();
        $professionnel2->setLoginlourd("loginpro2");
        $professionnel2->setPasswordlourd("Not24get");
        $professionnel2->setCivilite($civ1);
        $professionnel2->setNom("DUVAL");
        $professionnel2->SetPrenom("Alain");
        $professionnel2->SetEmail(strtolower("dalain@gmail.com"));
        $professionnel2->setVille(strtolower("Brest"));
        $professionnel2->setAdresse(strtolower("2 avenue de paris"));
        $manager->persist($professionnel2);

        $professionnel3 = new Professionnel();
        $professionnel3->setLoginlourd("loginpro3");
        $professionnel3->setPasswordlourd("Not24get");
        $professionnel3->setCivilite($civ2);
        $professionnel3->setNom("DURANT");
        $professionnel3->SetPrenom("Jocelyne");
        $professionnel3->SetEmail(strtolower("djocelyne@gmail.com"));
        $professionnel3->setVille(strtolower("Laval"));
        $professionnel3->setAdresse(strtolower("3 rue du grand champ"));
        $manager->persist($professionnel3);

        $professionnel4 = new Professionnel();
        $professionnel4->setLoginlourd("loginpro4");
        $professionnel4->setPasswordlourd("Not24get");
        $professionnel4->setCivilite($civ2);
        $professionnel4->setNom("PELIER");
        $professionnel4->SetPrenom("Jeanne");
        $professionnel4->SetEmail(strtolower("pjeanne@gmail.com"));
        $professionnel4->setVille(strtolower("Marseille"));
        $professionnel4->setAdresse(strtolower("4 rue du petit pont"));
        $manager->persist($professionnel4);

        $professionnel5 = new Professionnel();
        $professionnel5->setLoginlourd("loginpro5");
        $professionnel5->setPasswordlourd("Not24get");
        $professionnel5->setCivilite($civ1);
        $professionnel5->setNom("SAUNOIS");
        $professionnel5->SetPrenom("Bernard");
        $professionnel5->SetEmail(strtolower("sbernard@gmail.com"));
        $professionnel5->setVille(strtolower("Saumur"));
        $professionnel5->setAdresse(strtolower("5 rue de la charue"));
        $manager->persist($professionnel5);

        $professionnels = [$professionnel1,$professionnel2,$professionnel3,$professionnel4,$professionnel5];
        //endregion

        //region Casting
        $casting1 = new Casting();
        $casting1->setIntitule("Acteur test");
        $casting1->setReference(271);
        $casting1->setDateDebutPublication(new \DateTime("now"));
        $casting1->setNbrPoste(3);
        $casting1->setLocalisation("Laval");
        $casting1->setDescriptionPoste("ceci est la description du poste");
        $casting1->setDescriptionProfil("ceci est la description du profil");
        $casting1->setCoordonnees("02.38.93.04.56");
        $casting1->setDureeDiffusion(new \DateTime('2022-06-20'));
        $casting1->setContrat($contrat1);
        $casting1->setMetier($metier1);
        $casting1->setProfessionnel($professionnel1);
        $manager->persist($casting1);

        $casting2 = new Casting();
        $casting2->setIntitule("Danseur");
        $casting2->setReference(273);
        $casting2->setDateDebutPublication(new \DateTime("now"));
        $casting2->setNbrPoste(1);
        $casting2->setLocalisation("Paris");
        $casting2->setDescriptionPoste("ceci est la description du poste");
        $casting2->setDescriptionProfil("ceci est la description du profil");
        $casting2->setCoordonnees("02.38.93.45.23");
        $casting2->setDureeDiffusion(new \DateTime('2022-06-20'));
        $casting2->setContrat($contrat2);
        $casting2->setMetier($metier8);
        $casting2->setProfessionnel($professionnel2);
        $manager->persist($casting2);

        $casting3 = new Casting();
        $casting3->setIntitule("DJ soirée anniversaire");
        $casting3->setReference(275);
        $casting3->setDateDebutPublication(new \DateTime("now"));
        $casting3->setNbrPoste(1);
        $casting3->setLocalisation("Concarneau");
        $casting3->setDescriptionPoste("ceci est la description du poste");
        $casting3->setDescriptionProfil("ceci est la description du profil");
        $casting3->setCoordonnees("02.38.93.34.87");
        $casting3->setDureeDiffusion(new \DateTime('2022-06-20'));
        $casting3->setContrat($contrat1);
        $casting3->setMetier($metier5);
        $casting3->setProfessionnel($professionnel3);
        $manager->persist($casting3);

        $casting4 = new Casting();
        $casting4->setIntitule("Comédiens");
        $casting4->setReference(279);
        $casting4->setDateDebutPublication(new \DateTime("now"));
        $casting4->setNbrPoste(1);
        $casting4->setLocalisation("Anger");
        $casting4->setDescriptionPoste("ceci est la description du poste");
        $casting4->setDescriptionProfil("ceci est la description du profil");
        $casting4->setCoordonnees("02.38.93.23.21");
        $casting4->setDureeDiffusion(new \DateTime('2022-06-20'));
        $casting4->setContrat($contrat1);
        $casting4->setMetier($metier10);
        $casting4->setProfessionnel($professionnel4);
        $manager->persist($casting4);

        $casting5 = new Casting();
        $casting5->setIntitule("Musicien");
        $casting5->setReference(230);
        $casting5->setDateDebutPublication(new \DateTime("now"));
        $casting5->setNbrPoste(1);
        $casting5->setLocalisation("Le Mans");
        $casting5->setDescriptionPoste("ceci est la description du poste");
        $casting5->setDescriptionProfil("ceci est la description du profil");
        $casting5->setCoordonnees("02.38.93.32.87");
        $casting5->setDureeDiffusion(new \DateTime('2022-06-20'));
        $casting5->setContrat($contrat2);
        $casting5->setMetier($metier4);
        $casting5->setProfessionnel($professionnel5);
        $manager->persist($casting5);

        $faker = Factory::create('fr_FR');
        for ($i=0; $i < 100 ; $i++) {
            $casting = new Casting();
            $casting->setIntitule($faker->realTextBetween(5, 10))
                ->setReference($faker->randomNumber(3, true))
                ->setDateDebutPublication(new \DateTime("now"))
                ->setNbrPoste($faker->numberBetween(1, 5))
                ->setLocalisation($faker->departmentName())
                ->setDescriptionPoste("Description du poste")
                ->setDescriptionProfil("Description du profil dbzhedbnzeadhzebnixzhjndiozjdi nizdbj dna j dnaz l dazjln dka z,kdnak ,od nazk")
                ->setCoordonnees($faker->serviceNumber())
                ->setDureeDiffusion(new \DateTime('2022-09-20'))
                ->setContrat($faker->randomElement($contrats))
                ->setMetier($faker->randomElement($metiers))
                ->setProfessionnel($faker->randomElement($professionnels));
            $manager->persist($casting);
        }
        //endregion
        $manager->flush();
    }
}
