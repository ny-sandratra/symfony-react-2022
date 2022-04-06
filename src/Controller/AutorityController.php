<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutorityController extends AbstractController
{
    /**
     * @Route("/autority", name="autority")
     */
    public function index(): Response
    {
        return $this->render('autority/index.html.twig', [
            'controller_name' => 'AutorityController',
        ]);
    }
}
