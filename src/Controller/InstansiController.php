<?php

namespace App\Controller;

use App\Entity\Instansi;
use App\Form\InstansiType;
use App\Repository\InstansiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/instansi")
 */
class InstansiController extends AbstractController
{
    /**
     * @Route("/", name="instansi_index", methods={"GET"})
     */
    public function index(InstansiRepository $instansiRepository): Response
    {
        return $this->render('instansi/index.html.twig', [
            'instansis' => $instansiRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="instansi_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $instansi = new Instansi();
        $form = $this->createForm(InstansiType::class, $instansi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($instansi);
            $entityManager->flush();

            return $this->redirectToRoute('instansi_index');
        }

        return $this->render('instansi/new.html.twig', [
            'instansi' => $instansi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="instansi_show", methods={"GET"})
     */
    public function show(Instansi $instansi): Response
    {
        return $this->render('instansi/show.html.twig', [
            'instansi' => $instansi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="instansi_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Instansi $instansi): Response
    {
        $form = $this->createForm(InstansiType::class, $instansi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('instansi_index');
        }

        return $this->render('instansi/edit.html.twig', [
            'instansi' => $instansi,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="instansi_delete", methods={"POST"})
     */
    public function delete(Request $request, Instansi $instansi): Response
    {
        if ($this->isCsrfTokenValid('delete'.$instansi->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($instansi);
            $entityManager->flush();
        }

        return $this->redirectToRoute('instansi_index');
    }
}
