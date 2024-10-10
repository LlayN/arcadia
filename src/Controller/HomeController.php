<?php

namespace App\Controller;

use App\Entity\Schedules;
use App\Entity\Services;
use App\Entity\Testimonials;
use App\Form\TestimonialsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManagerInterface, Request $request): Response
    {

        $testimonial = new Testimonials();
        $form = $this->createForm(TestimonialsType::class, $testimonial);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $testimonial = $form->getData();
            $entityManagerInterface->persist($testimonial);
            $entityManagerInterface->flush();

            $this->addFlash(
                'success',
                'Nous vous remercions pour votre avis. Il sera examiné attentivement et publié s\'il est jugé pertinent pour notre parc.'
            );
            return $this->redirectToRoute('app_home');
        }

        $testimonials = $entityManagerInterface->getRepository(Testimonials::class)->findAll();
        $schedules = $entityManagerInterface->getRepository(Schedules::class)->findAll();
        $services = $entityManagerInterface->getRepository(Services::class)->findAll();


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'form' => $form,
            'testimonials' => $testimonials,
            'services' => $services,
            'schedules' => $schedules
        ]);
    }
}
