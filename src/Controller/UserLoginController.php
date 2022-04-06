<?php

namespace App\Controller;

use App\Entity\UserLogin;
use App\Form\UserLoginType;
use App\Repository\UserLoginRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user/login")
 */
class UserLoginController extends AbstractController
{
    /**
     * @Route("/", name="user_login_index", methods={"GET"})
     */
    public function index(UserLoginRepository $userLoginRepository): Response
    {
        return $this->render('user_login/index.html.twig', [
            'user_logins' => $userLoginRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_login_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $userLogin = new UserLogin();
        $form = $this->createForm(UserLoginType::class, $userLogin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($userLogin);
            $entityManager->flush();

            return $this->redirectToRoute('user_login_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_login/new.html.twig', [
            'user_login' => $userLogin,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_login_show", methods={"GET"})
     */
    public function show(UserLogin $userLogin): Response
    {
        return $this->render('user_login/show.html.twig', [
            'user_login' => $userLogin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_login_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, UserLogin $userLogin, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserLoginType::class, $userLogin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('user_login_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user_login/edit.html.twig', [
            'user_login' => $userLogin,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="user_login_delete", methods={"POST"})
     */
    public function delete(Request $request, UserLogin $userLogin, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userLogin->getId(), $request->request->get('_token'))) {
            $entityManager->remove($userLogin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_login_index', [], Response::HTTP_SEE_OTHER);
    }
}
