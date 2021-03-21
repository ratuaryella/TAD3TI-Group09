<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pertanyaan;
use App\Form\PertanyaanType;
use App\Repository\PertanyaanRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/start", name="start_page")
     */
    public function start(){
        return $this->render('home/start.html.twig',[
            'controller_name'=>'HomeController',
        ]);
    }

    /**
     * @Route("/survei", name="survei", methods={"GET"})
     */
    public function survei(PertanyaanRepository $pertanyaanRepository){
        return $this->render('home/survei.html.twig', [
            'pertanyaans' => $pertanyaanRepository->findAll(),
        ]);
    }
}
