<?php

namespace App\Controller\Admin;

use App\Entity\Instansi;
use App\Entity\Layanan;
use App\Entity\Pertanyaan;
use App\Entity\Responden;
use App\Repository\JawabanRepository;
use App\Repository\PertanyaanRepository;
use App\Repository\RespondenRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    protected RespondenRepository $respondenRepository;

    protected JawabanRepository $jawabanRepository;

    protected PertanyaanRepository $pertanyaanRepository;

    public function __construct(
        RespondenRepository $respondenRepository,
        JawabanRepository $jawabanRepository,
        PertanyaanRepository $pertanyaanRepository
    )
    {
        $this->respondenRepository = $respondenRepository;
        $this->jawabanRepository = $jawabanRepository;
        $this->pertanyaanRepository = $pertanyaanRepository;
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig',[
                'countResponden' => $this->respondenRepository->countAllResponden(),
                'pertanyaans' => $this->pertanyaanRepository->findAll(),
                'IKMQuestions' => $this->jawabanRepository->getIKMperQuestion()
            ]);
//        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sikemas');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Instansi', 'fa fa-building', Instansi::class);
        yield MenuItem::linkToCrud('Layanan', 'fa fa-check-square', Layanan::class);
        yield MenuItem::linkToCrud('Pertanyaan','fa fa-question-circle',Pertanyaan::class);
//        yield MenuItem::linkToCrud('Buku Tamu','fa fa-users', Responden::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
