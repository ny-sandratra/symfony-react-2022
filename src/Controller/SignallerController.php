<?php

namespace App\Controller;

use App\Entity\Signaller;
use App\Form\SignallerType;
use App\Repository\SignallerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/signaller")
 */
class SignallerController extends AbstractController
{
    /**
     * @Route("/", name="signaller_index", methods={"GET"})
     */
    public function index(SignallerRepository $signallerRepository): Response
    {
        return $this->render('signaller/index.html.twig', [
            'signallers' => $signallerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="signaller_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $signaller = new Signaller();
        $form = $this->createForm(SignallerType::class, $signaller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($signaller);
            $entityManager->flush();

            return $this->redirectToRoute('signaller_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('signaller/new.html.twig', [
            'signaller' => $signaller,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="signaller_show", methods={"GET"})
     */
    public function show(Signaller $signaller): Response
    {
        return $this->render('signaller/show.html.twig', [
            'signaller' => $signaller,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="signaller_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Signaller $signaller, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SignallerType::class, $signaller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('signaller_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('signaller/edit.html.twig', [
            'signaller' => $signaller,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="signaller_delete", methods={"POST"})
     */
    public function delete(Request $request, Signaller $signaller, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$signaller->getId(), $request->request->get('_token'))) {
            $entityManager->remove($signaller);
            $entityManager->flush();
        }

        return $this->redirectToRoute('signaller_index', [], Response::HTTP_SEE_OTHER);
    }
}
