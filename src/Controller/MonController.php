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
        $em = $doctrine ->getManager();
        $castingsREPO = $em -> getRepository(Casting::class);
        $castings = $castingsREPO->findAll();


        return $this->render('mon/index.html.twig', [
            'castings' => $castings,
        ]);


    }
    #[Route('/casting/{id}', name: 'app_casting')]
    public function casting(ManagerRegistry $doctrine,$id): Response
    {
        //Récupération du casting
        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT casting FROM App\Entity\Casting casting WHERE casting.idCasting = :id');
        $query->setParameter('id', $id);
        $casting = $query->getResult();


        //Récupération des casting
        $em = $doctrine ->getManager();
        $castingsREPO = $em -> getRepository(Casting::class);
        $castings = $castingsREPO->findAll();
        return $this->render('mon/casting.html.twig', [
            'casting' => $casting[0],
            'castings' => $castings,
        ]);


    }
}
