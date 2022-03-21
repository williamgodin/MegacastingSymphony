<?php

namespace App\Controller;

use App\Entity\Casting;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooterController extends AbstractController
{
    #[Route('/footer', name: 'app_footer')]
    public function index(ManagerRegistry $doctrine): Response
    {
        //Récupération des casting
        $em = $doctrine ->getManager();
        $castingsREPO = $em -> getRepository(Casting::class);
        $castings = $castingsREPO->findAll();


        return $this->render('layout/footer.html.twig', [
            'castings' => $castings,
        ]);
    }
}
