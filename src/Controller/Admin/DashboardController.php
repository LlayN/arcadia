<?php

namespace App\Controller\Admin;

use App\Entity\Animals;
use App\Entity\Breeds;
use App\Entity\EmployeesReports;
use App\Entity\Livings;
use App\Entity\Services;
use App\Entity\Testimonials;
use App\Entity\Users;
use App\Entity\VeterinariansReports;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        return $this->render('admin/admin.dashboard.html.twig');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
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


        yield MenuItem::section('Administration');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas', Users::class);
        yield MenuItem::linkToCrud('Animaux', 'fas', Animals::class);
        yield MenuItem::linkToCrud('Races', 'fas', Breeds::class);

        yield MenuItem::section('Employés');
        yield MenuItem::linkToCrud('Rapports Employés', 'fas', EmployeesReports::class);
        yield MenuItem::linkToCrud('Avis', 'fas', Testimonials::class);
        yield MenuItem::linkToCrud('Services', 'fas', Services::class);


        yield MenuItem::section('Vétérinaires');
        yield MenuItem::linkToCrud('Rapports Vétérinaires', 'fas', VeterinariansReports::class);
        yield MenuItem::linkToCrud('Habitats', 'fas', Livings::class);

        yield MenuItem::linkToRoute('Retour au site', '', 'app_home')->setCssClass('btn back-secondary justify-content-center back-secondary text-white mt-4');
    }

}