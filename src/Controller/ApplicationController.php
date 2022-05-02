<?php

namespace App\Controller;

use App\Entity\Application;
use App\Entity\Postuler;
use App\Form\Type\ApplicationType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{

#[Route('{id}/new', name: 'postuler')]

    public function new(Request $request, ManagerRegistry $doctrine, $id ): Response
    {
        $user = $this->getUser();
        $application = new Postuler();
        $application->setDatePostulation(new \DateTime('today'));
        $form = $this->createForm(ApplicationType::class, $application);

        $em = $doctrine->getManager();
        $query = $em->createQuery('SELECT c FROM App\Entity\Casting c WHERE c.idCasting = :id')->setMaxResults(1);
        $query->setParameter('id', $id);
        $casting = $query->getResult()[0];

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $application->setPersonne($user);
            $application->setCasting($casting);
            $em->persist($application);
            $em->flush();

            return $this->redirectToRoute('app_mon');
        }
        return $this->renderForm('application/index.html.twig', [
            'form' => $form,
        ]);
    }

}
