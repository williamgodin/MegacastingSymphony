<?php

namespace App\Controller;

use App\Entity\Casting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonController extends AbstractController
{
    #[Route('/mon', name: 'app_mon')]
    public function index(ManagerRegistry $doctrine): Response
    {
        //Récupération des casting
        $em = $doctrine ->getManager();
        $enteteREPO = $em -> getRepository(Casting::class);
        $entetes = $enteteREPO->findAll();
        dump($entetes);

        return $this->render('mon/index.html.twig', [
            'controller_name' => 'MonController',
        ]);
    }
}
