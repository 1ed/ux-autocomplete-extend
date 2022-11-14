<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'app_post')]
    public function index(): Response
    {
        $form = $this->createForm(\App\Form\PostFormType::class)	    ;

        return $this->renderForm('post/index.html.twig', [
            'form' => $form,
            'controller_name' => 'PostController',
        ]);
    }
}
