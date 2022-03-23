<?php

namespace App\Controller;

use App\Entity\Application;
use App\Form\Type\ApplicationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplicationController extends AbstractController
{

#[Route('/application/new', name: 'app_application')]

    public function new(): Response
    {
        // creates a task object and initializes some data for this example
        $application = new Application();
        $application->setFirstname('William');
        $application->setLastname('GODIN');
        $application->setApplicationDate(new \DateTime('today'));

        $form = $this->createForm(ApplicationType::class, $application);

        return $this->renderForm('application/index.html.twig', [
            'Controller_name' => 'ApplicationController',
            'form' => $form,
        ]);
    }

}
