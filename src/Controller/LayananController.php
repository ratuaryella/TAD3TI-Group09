<?php

namespace App\Controller;

use App\Entity\Layanan;
use App\Form\LayananType;
use App\Repository\LayananRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/layanan")
 */
class LayananController extends AbstractController
{
    /**
     * @Route("/", name="layanan_index", methods={"GET"})
     */
    public function index(LayananRepository $layananRepository): Response
    {
        return $this->render('layanan/index.html.twig', [
            'layanans' => $layananRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="layanan_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $layanan = new Layanan();
        $form = $this->createForm(LayananType::class, $layanan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($layanan);
            $entityManager->flush();

            return $this->redirectToRoute('layanan_index');
        }

        return $this->render('layanan/new.html.twig', [
            'layanan' => $layanan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="layanan_show", methods={"GET"})
     */
    public function show(Layanan $layanan): Response
    {
        return $this->render('layanan/show.html.twig', [
            'layanan' => $layanan,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="layanan_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Layanan $layanan): Response
    {
        $form = $this->createForm(LayananType::class, $layanan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('layanan_index');
        }

        return $this->render('layanan/edit.html.twig', [
            'layanan' => $layanan,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="layanan_delete", methods={"POST"})
     */
    public function delete(Request $request, Layanan $layanan): Response
    {
        if ($this->isCsrfTokenValid('delete'.$layanan->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($layanan);
            $entityManager->flush();
        }

        return $this->redirectToRoute('layanan_index');
    }
}
