<?php

namespace App\Controller;

use App\Document\Visitor;
use App\Entity\Schedules;
use App\Entity\Services;
use App\Entity\Testimonials;
use App\Form\TestimonialsType;
use DateTime;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManagerInterface, Request $request, DocumentManager $dm): Response
    {
        // Vérifier si le ID session n'existe pas déjà dans la BDD


        $repository = $dm->getRepository(Visitor::class);

        $visitor = $repository->findOneBy(['session_id' => $request->getSession()->getId()]);

        if (!isset($visitor)) {
            $visitor = new Visitor();
            $visitor->setSessionId($request->getSession()->getId());
            $visitor->setIpAddress($request->getClientIp());
            $visitor->setVisitedAt(DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s')));
            $visitor->setLanguage($request->getPreferredLanguage());
            $visitor->setUserAgent($request->headers->get('User-Agent'));

            $dm->persist($visitor);
            $dm->flush();
        }


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
