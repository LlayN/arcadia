<?php

namespace App\Controller;

use App\Document\Consultation;
use App\Repository\AnimalsRepository;
use App\Repository\LivingsRepository;
use App\Repository\VeterinariansReportsRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

if (isset($_POST['idAnimal'])) {
    header("Location : https://developer.mozilla.org/fr/docs/Web/HTML/Element/input ");
}

class LivingsController extends AbstractController
{
    private $animalRepository;

    #[Route('/habitats', name: 'app_livings')]
    public function index(): Response
    {
        return $this->render('livings/livings.html.twig');
    }

    #[Route('/habitats/{slug}', name: 'app_living_slug')]
    public function livings($slug, AnimalsRepository $animalsRepository, LivingsRepository $livingsRepository, Request $request, VeterinariansReportsRepository $veterinariansRepository): Response
    {

        $livings = $livingsRepository->findBy(['name' => $slug]);

        if (!empty($livings)) {

            $firstElement = $livings[0];


            $animals = $animalsRepository->findBy(['living' => $firstElement->getId()]);
            $veterinariansReports = $veterinariansRepository->findBy(['animal' => $animals], ['datetime' => 'DESC']);

            if ($slug === 'savane') {
                $livings = $livingsRepository->findBy(['name' => 'Savane']);

                return $this->render('livings/savane.html.twig', [
                    'animals' => $animals,
                    'livings' => $livings,
                    'veterinariansReports' => $veterinariansReports
                ]);
            } else if ($slug === 'jungle') {
                $livings = $livingsRepository->findBy(['name' => 'Jungle']);
                return $this->render('livings/jungle.html.twig', [
                    'animals' => $animals,
                    'livings' => $livings,
                    'veterinariansReports' => $veterinariansReports
                ]);
            } else if ($slug === 'marais') {
                $livings = $livingsRepository->findBy(['name' => 'Marais']);
                return $this->render('livings/marais.html.twig', [
                    'animals' => $animals,
                    'livings' => $livings,
                    'veterinariansReports' => $veterinariansReports
                ]);
            } else {
                return $this->render('errors/404.html.twig');
            }
        } else {
            return $this->render('errors/404.html.twig');
        }
    }


    #[Route('/increment-view', name: 'increment_view', methods: ['POST'])]
    public function incrementView(Request $request, DocumentManager $dm): Response
    {
        $repository = $dm->getRepository(Consultation::class);
        $idAnimal = $request->request->get('idAnimal');

        $consultation = $repository->findOneBy(['animal_id' => $idAnimal]);

        $ip_list = [];
        $currentIp = $request->getClientIp();

        if ($consultation) {

            $ip_list = $consultation->getConsultationIp();
            if (!in_array($currentIp, $ip_list)) {
                $ip_list[] = $currentIp;
                $consultation->setConsultation($consultation->getConsultation() + 1);
            }
        } else {

            $consultation = new Consultation();
            $consultation->setAnimalId($idAnimal);
            $consultation->setConsultation(1);
            $ip_list[] = $currentIp;
        }


        $consultation->setConsultationIp($ip_list);


        $dm->persist($consultation);
        $dm->flush();

        return new Response();
    }
}
