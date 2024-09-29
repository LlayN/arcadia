<?php

namespace App\Controller\Admin;

use App\Entity\Animals;
use App\Entity\Breeds;
use App\Entity\EmployeesReports;
use App\Entity\Livings;
use App\Entity\Services;
use App\Entity\Testimonials;
use App\Entity\User;
use App\Entity\VeterinariansReports;
use App\Repository\EmployeesReportsRepository;
use App\Repository\SchedulesRepository;
use App\Repository\ServicesRepository;
use App\Repository\TestimonialsRepository;
use App\Repository\UserRepository;
use App\Repository\VeterinariansReportsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    
    #[Route('/admin', name: 'admin')]
    public function show(VeterinariansReportsRepository $veterinariansReportsRepository, EmployeesReportsRepository $employeesReportsRepository, TestimonialsRepository $testimonialsRepository, UserRepository $userRepository, SchedulesRepository $schedulesRepository): Response {
        $user = $this->getUser();

         if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return $this->render('admin/admin.dashboard.html.twig', [
                'veterinariansReports' => $veterinariansReportsRepository->findAll(),
                'employeesReports' => $employeesReportsRepository->findAll(),
                'testimonials' => $testimonialsRepository->findAll(),
                'users' => $userRepository->findAll(),
                'schedules' => $schedulesRepository->findAll(),
            ]);
        } 
        
        elseif (in_array('ROLE_VETO', $user->getRoles())) {
            return $this->render('admin/veto.dashboard.html.twig', [
                'veterinariansReports' => $veterinariansReportsRepository->findAll(),
                'employeesReports' => $employeesReportsRepository->findAll(),
            ]);
            
        } 
        
        elseif (in_array('ROLE_EMPLOYE', $user->getRoles())) {
            return $this->render('admin/employe.dashboard.html.twig', [
                'employeesReports' => $employeesReportsRepository->findAll(),
                'testimonials' => $testimonialsRepository->findAll(),
            ]);
            
        } 
        else {
            return $this->render('admin/error.html.twig');
        } 
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="/uploads/admin/logo/logo-black.svg" alt="" class="logo">')
            ->disableDarkMode();
    }

    public function configureAssets(): Assets
    {
        return Assets::new()->addCssFile('css/style.css');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Menu');
        yield MenuItem::linkToRoute('Tableau de bord', 'fas', 'admin');


        yield MenuItem::section('Administration')->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas', User::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Animaux', 'fas', Animals::class)->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Races', 'fas', Breeds::class)->setPermission('ROLE_ADMIN');

        yield MenuItem::section('Employés');
        yield MenuItem::linkToCrud('Rapports Employés', 'fas', EmployeesReports::class);
        yield MenuItem::linkToCrud('Avis', 'fas', Testimonials::class)->setPermission('ROLE_EMPLOYE');
        yield MenuItem::linkToCrud('Services', 'fas', Services::class)->setPermission('ROLE_EMPLOYE');


        yield MenuItem::section('Vétérinaires')->setPermission('ROLE_VETO');
        yield MenuItem::linkToCrud('Rapports Vétérinaires', 'fas', VeterinariansReports::class)->setPermission('ROLE_VETO');
        yield MenuItem::linkToCrud('Habitats', 'fas', Livings::class)->setPermission('ROLE_VETO');

        yield MenuItem::linkToRoute('Retour au site', '', 'app_home')->setCssClass('btn back-secondary justify-content-center back-secondary text-white mt-5');
        yield MenuItem::linkToRoute('Déconnexion', '', 'app_logout')->setCssClass('btn bg-dark justify-content-center text-white mt-2');
    }

}