<?php

namespace App\Controller;

use App\Entity\R\esponden;
use App\Form\RespondenType;
use App\Repository\RespondenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/responden")
 */
class RespondenController extends AbstractController
{
    /**
     * @Route("/", name="responden_index", methods={"GET"})
     */
    public function index(RespondenRepository $respondenRepository): Response
    {
        return $this->render('responden/index.html.twig', [
            'respondens' => $respondenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="responden_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $responden = new Responden();
        $form = $this->createForm(RespondenType::class, $responden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($responden);
            $entityManager->flush();

            return $this->redirectToRoute('responden_index');
        }

        return $this->render('responden/new.html.twig', [
            'responden' => $responden,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="responden_show", methods={"GET"})
     */
    public function show(Responden $responden): Response
    {
        return $this->render('responden/show.html.twig', [
            'responden' => $responden,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="responden_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Responden $responden): Response
    {
        $form = $this->createForm(RespondenType::class, $responden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('responden_index');
        }

        return $this->render('responden/edit.html.twig', [
            'responden' => $responden,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="responden_delete", methods={"POST"})
     */
    public function delete(Request $request, Responden $responden): Response
    {
        if ($this->isCsrfTokenValid('delete'.$responden->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($responden);
            $entityManager->flush();
        }

        return $this->redirectToRoute('responden_index');
    }
}
