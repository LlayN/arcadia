<?php

namespace App\Controller;

use App\Entity\Services;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(EntityManagerInterface $entityManager): Response
    {


        $services = $entityManager->getRepository(Services::class)->findAll();


        return $this->render('services/services.html.twig', [
            'controller_name' => 'ServicesController',
            'services' => $services
        ]);
    }
}
