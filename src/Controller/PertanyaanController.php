<?php

namespace App\Controller;

use App\Entity\Pertanyaan;
use App\Form\PertanyaanType;
use App\Repository\PertanyaanRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/pertanyaan")
 */
class PertanyaanController extends AbstractController
{
    /**
     * @Route("/", name="pertanyaan_index", methods={"GET"})
     */
    public function index(PertanyaanRepository $pertanyaanRepository): Response
    {
        return $this->render('pertanyaan/index.html.twig', [
            'pertanyaans' => $pertanyaanRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="pertanyaan_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pertanyaan = new Pertanyaan();
        $form = $this->createForm(PertanyaanType::class, $pertanyaan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pertanyaan);
            $entityManager->flush();

            return $this->redirectToRoute('pertanyaan_index');
        }

        return $this->render('pertanyaan/new.html.twig', [
            'pertanyaan' => $pertanyaan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pertanyaan_show", methods={"GET"})
     */
    public function show(Pertanyaan $pertanyaan): Response
    {
        return $this->render('pertanyaan/show.html.twig', [
            'pertanyaan' => $pertanyaan,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="pertanyaan_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Pertanyaan $pertanyaan): Response
    {
        $form = $this->createForm(PertanyaanType::class, $pertanyaan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pertanyaan_index');
        }

        return $this->render('pertanyaan/edit.html.twig', [
            'pertanyaan' => $pertanyaan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="pertanyaan_delete", methods={"POST"})
     */
    public function delete(Request $request, Pertanyaan $pertanyaan): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pertanyaan->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pertanyaan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('pertanyaan_index');
    }
}
