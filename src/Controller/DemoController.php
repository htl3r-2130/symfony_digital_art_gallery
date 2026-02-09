<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DemoController extends AbstractController
{   
    #[Route('/demo', name: 'app_demo', methods:['GET'])]
    public function index(): Response
    {
        return $this->render(
            'demo.html.twig'
        );
    }
}
