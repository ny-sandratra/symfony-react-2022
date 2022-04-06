<?php

namespace App\Controller;

use App\Entity\Declaration;
use App\Form\DeclarationType;
use App\Repository\DeclarationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/declaration")
 */
class DeclarationController extends AbstractController
{
    /**
     * @Route("/", name="declaration_index", methods={"GET"})
     */
    public function index(DeclarationRepository $declarationRepository): Response
    {
        return $this->render('declaration/index.html.twig', [
            'declarations' => $declarationRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="declaration_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $declaration = new Declaration();
        $form = $this->createForm(DeclarationType::class, $declaration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($declaration);
            $entityManager->flush();

            return $this->redirectToRoute('declaration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('declaration/new.html.twig', [
            'declaration' => $declaration,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="declaration_show", methods={"GET"})
     */
    public function show(Declaration $declaration): Response
    {
        return $this->render('declaration/show.html.twig', [
            'declaration' => $declaration,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="declaration_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Declaration $declaration, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DeclarationType::class, $declaration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('declaration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('declaration/edit.html.twig', [
            'declaration' => $declaration,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="declaration_delete", methods={"POST"})
     */
    public function delete(Request $request, Declaration $declaration, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$declaration->getId(), $request->request->get('_token'))) {
            $entityManager->remove($declaration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('declaration_index', [], Response::HTTP_SEE_OTHER);
    }
}
