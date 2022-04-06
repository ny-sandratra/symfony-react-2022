<?php

namespace App\Controller;

use App\Entity\Moto;
use App\Form\MotoType;
use App\Repository\MotoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moto")
 */
class MotoController extends AbstractController
{
    /**
     * @Route("/", name="moto_index", methods={"GET"})
     */
    public function index(MotoRepository $motoRepository): Response
    {
        return $this->render('moto/index.html.twig', [
            'motos' => $motoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="moto_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $moto = new Moto();
        $form = $this->createForm(MotoType::class, $moto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($moto);
            $entityManager->flush();

            return $this->redirectToRoute('moto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('moto/new.html.twig', [
            'moto' => $moto,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="moto_show", methods={"GET"})
     */
    public function show(Moto $moto): Response
    {
        return $this->render('moto/show.html.twig', [
            'moto' => $moto,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="moto_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Moto $moto, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MotoType::class, $moto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('moto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('moto/edit.html.twig', [
            'moto' => $moto,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="moto_delete", methods={"POST"})
     */
    public function delete(Request $request, Moto $moto, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$moto->getId(), $request->request->get('_token'))) {
            $entityManager->remove($moto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('moto_index', [], Response::HTTP_SEE_OTHER);
    }
}
