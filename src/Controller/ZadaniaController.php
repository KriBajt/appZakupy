<?php

namespace App\Controller;

use App\Entity\Zadania;
use App\Form\ZadaniaType;
use App\Repository\ZadaniaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/zadania")
 */
class ZadaniaController extends AbstractController
{
    /**
     * @Route("/", name="zadania_index", methods={"GET"})
     */
    public function index(ZadaniaRepository $zadaniaRepository): Response
    {
        return $this->render('zadania/index.html.twig', [
            'zadanias' => $zadaniaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nowy", name="zadania_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $zadanium = new Zadania();
        $form = $this->createForm(ZadaniaType::class, $zadanium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($zadanium);
            $entityManager->flush();

            return $this->redirectToRoute('zadania_index');
        }

        return $this->render('zadania/new.html.twig', [
            'zadanium' => $zadanium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="zadania_show", methods={"GET"})
     */
    public function show(Zadania $zadanium): Response
    {
        return $this->render('zadania/show.html.twig', [
            'zadanium' => $zadanium,
        ]);
    }

    /**
     * @Route("/{id}/edytuj", name="zadania_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Zadania $zadanium): Response
    {
        $form = $this->createForm(ZadaniaType::class, $zadanium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('zadania_index');
        }

        return $this->render('zadania/edit.html.twig', [
            'zadanium' => $zadanium,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="zadania_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Zadania $zadanium): Response
    {
        if ($this->isCsrfTokenValid('delete'.$zadanium->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($zadanium);
            $entityManager->flush();
        }

        return $this->redirectToRoute('zadania_index');
    }
}
