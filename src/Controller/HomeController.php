<?php

namespace App\Controller;

use App\Entity\Jawaban;
use App\Entity\Responden;
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
        return $this->render('home/index.html.twig');
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
    public function survei(){
        if(!$this->sessionExists()){
//            $this->addFlash('error','Daftar terlebih dahulu');
            return $this->redirectToRoute('start_page');
        }
        $pertanyaanRepository = $this->getDoctrine()->getRepository(Pertanyaan::class);
        $all_pertanyaan = $pertanyaanRepository->findAll();
        $jawaban = 0;

        return $this->render('home/survei.html.twig', [
            'pertanyaans' => $all_pertanyaan, 'jawaban' =>$jawaban
        ]);
    }

    /**
     * @Route("/jawab", name="jawab", methods={"POST"})
     */
    public function jawab(){
        $pertanyaanRepository = $this->getDoctrine()->getRepository(Pertanyaan::class);
        $entityManager = $this->getDoctrine()->getManager();
        $time = new \DateTime();
        $responden = new Responden();
        $respondenRepository = $this->getDoctrine()->getRepository(Responden::class);
        $thisResponden= $respondenRepository->find($_POST['responden']);


        for($x=0; $x<$_POST['jawaban']; $x++){
            $thisPertanyaan = new Pertanyaan();
            $thisPertanyaan = $pertanyaanRepository->findOneById($_POST[''.$x.'']);

            $jawaban = new Jawaban();
            $jawaban->setResponden($thisResponden);
            $jawaban->setJawaban($_POST['data'.$x.'']);
            $jawaban->setPertanyaan($thisPertanyaan);
            $jawaban->setTanggal($time);
            $entityManager->persist($jawaban);
            $entityManager->flush($jawaban);
        }

//        $this->addFlash('success','Terimakasih telah melakukan survei');
        return $this->redirectToRoute('home');
    }

    public function sessionExists(){
        if(!empty($_SESSION)){
            return true;
        }else{
            return false;
        }
    }
}
