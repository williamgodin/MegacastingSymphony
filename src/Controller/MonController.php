<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Entity\Casting;
use App\Entity\Postuler;
use App\Repository\CastingRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Faker\Factory;
use Symfony\Component\Security\Core\Security;

class MonController extends AbstractController
{
    private Security $security;
    public function __construct(Security $security){
        $this->security = $security;
    }
    #[Route('/', name: 'app_mon')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();
        $search = '';
        //controle de la rechercher
        if (isset($_GET['s'])) {
            $search = $request->query->get('s');
        }
        if($request->query->get("s")){
            $search = $request->query->get("s");
        }
        if(strlen((trim($search)) !=0)){
            $castings = $em->createQuery('SELECT o FROM App\Entity\Casting o WHERE o.intitule LIKE :search');
            $castings->setParameter('search','%'.$search.'%');
            $castings = $castings->getResult();
        }
        else{
            $castings = $em->getRepository(Casting::class);
            $castings = $castings->findAll();
        }
        if(empty($castings)){
            $bool = true;
        }else {
            $bool = false;
        }
        $limit = 12;

        $page = (int)$request->query->get("page", 1);
        $castingRepository = $em->getRepository(Casting::class);
        $castins = $castingRepository->getPaginateCastings($page, $limit);

        $total = $castingRepository->getTotalCastings();

        return $this->render('mon/index.html.twig', [
            'castings' => $castings,
            'total' => $total,
            'page'=>$page,
            'limit'=>$limit,
        ]);
    }
    public function footer(ManagerRegistry $doctrine, Request $request): Response
    {
        //controle de la rechercher
        if (isset($_GET['s'])) {
            $search = $request->query->get('s');
        }


        //Récupération des casting
        $em = $doctrine->getManager();
        $castingsREPO = $em->getRepository(Casting::class);
        $castings = $castingsREPO->findAll();


        return $this->render('layout/footer.html.twig', [
            'castings' => $castings,
        ]);


    }

    #[Route('/casting/{id}', name: 'app_casting')]
    public function casting(ManagerRegistry $doctrine, $id): Response
    {
        //Récupération du casting
        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT casting FROM App\Entity\Casting casting WHERE casting.idCasting = :id');
        $query->setParameter('id', $id);
        $casting = $query->getResult();


        //Récupération des casting
        $em = $doctrine->getManager();
        $castingsREPO = $em->getRepository(Casting::class);
        $castings = $castingsREPO->findAll();
        return $this->render('mon/casting.html.twig', [
            'casting' => $casting[0],
            'castings' => $castings,
        ]);


    }

    #[Route('/cinema', name: 'app_cinema')]
    public function cinema(ManagerRegistry $doctrine): Response
    {
        //Récupération des castings cinéma
        $em = $doctrine->getManager();
        $query = $em->createQuery('
        SELECT casting 
        FROM App\Entity\Casting casting
        WHERE casting.Metier = 1
        OR casting.Metier = 2
        OR casting.Metier = 3');
        $castingcinema = $query->getResult();

        //Récupération des casting
        $em = $doctrine->getManager();
        $castingsREPO = $em->getRepository(Casting::class);
        $castings = $castingsREPO->findAll();


        return $this->render('mon/cinema.html.twig', [
            'castingcinema' => $castingcinema,
            'castings' => $castings,
        ]);
    }
    #[Route('/musique', name: 'app_musique')]
    public function musique(ManagerRegistry $doctrine): Response
    {
        //Récupération des castings musique
        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT casting 
        FROM App\Entity\Casting casting
        WHERE casting.Metier = 4
        OR casting.Metier = 5
        OR casting.Metier = 6
        OR casting.Metier = 7');
        $castingmusique = $query->getResult();

        //Récupération des casting
        $em = $doctrine->getManager();
        $castingsREPO = $em->getRepository(Casting::class);
        $castings = $castingsREPO->findAll();
        return $this->render('mon/musique.html.twig', [
            'castingmusique' => $castingmusique,
            'castings' => $castings,
        ]);
    }
    #[Route('/danse', name: 'app_danse')]
    public function danse(ManagerRegistry $doctrine): Response
    {
        //Récupération des castings danse
        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT casting 
        FROM App\Entity\Casting casting
        WHERE casting.Metier = 8
        OR casting.Metier = 9');
        $castingdanse = $query->getResult();

        //Récupération des casting
        $em = $doctrine->getManager();
        $castingsREPO = $em->getRepository(Casting::class);
        $castings = $castingsREPO->findAll();
        return $this->render('mon/danse.html.twig', [
            'castingdanse' => $castingdanse,
            'castings' => $castings,
        ]);
    }
    #[Route('/theatre', name: 'app_theatre')]
    public function theatre(ManagerRegistry $doctrine): Response
    {
        //Récupération des castings theatre
        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT casting 
        FROM App\Entity\Casting casting
        WHERE casting.Metier = 10
        OR casting.Metier = 11
        OR casting.Metier = 12');
        $castingtheatre = $query->getResult();

        //Récupération des casting
        $em = $doctrine->getManager();
        $castingsREPO = $em->getRepository(Casting::class);
        $castings = $castingsREPO->findAll();
        return $this->render('mon/theatre.html.twig', [
            'castingtheatre' => $castingtheatre,
            'castings' => $castings,
        ]);
    }
    #[Route('/profil', name: 'app_profil')]
    public function profil(ManagerRegistry $doctrine): Response
    {


        //Récupération des casting
        $em = $doctrine->getManager();
        $castingsREPO = $em->getRepository(Casting::class);
        $castings = $castingsREPO->findAll();

        //Récupération de l'artiste
        $artiste = $this->security->getUser();
        dump($artiste);

        $queryPostulations = $em->createQueryBuilder()
            ->select('p')
            ->from(Postuler::class,'p')
            ->where('p.Personne = :personne')
            ->setParameter('personne', $this->getUser()->getIdPersonne());
        $postulations = $queryPostulations->getQuery()->getResult();



        return $this->render('profil/profil.html.twig', [
            'castings' => $castings,
            'artiste' => $artiste,
            'postulations' => $postulations,
        ]);
    }
}
