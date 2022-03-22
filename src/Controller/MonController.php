<?php

namespace App\Controller;

use App\Entity\Casting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonController extends AbstractController
{
    #[Route('/', name: 'app_mon')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        //controle de la rechercher
        if (isset($_GET['s'])) {
            $search = $request->query->get('s');
        }


        //Récupération des casting
        $em = $doctrine->getManager();
        $castingsREPO = $em->getRepository(Casting::class);
        $castings = $castingsREPO->findAll();


        return $this->render('mon/index.html.twig', [
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
        $query = $em->createQuery('SELECT casting FROM App\Entity\Casting casting WHERE casting.Metier = 1');
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
        $query = $em->createQuery('SELECT casting FROM App\Entity\Casting casting WHERE casting.Metier = 2');
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
        $query = $em->createQuery('SELECT casting FROM App\Entity\Casting casting WHERE casting.Metier = 3');
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
        $query = $em->createQuery('SELECT casting FROM App\Entity\Casting casting WHERE casting.Metier = 4');
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
}
