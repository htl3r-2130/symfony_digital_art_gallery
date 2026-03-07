<?php
// src/Controller/ArtworkController.php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtworkController extends AbstractController
{
    #[Route('/artworks', name: 'artwork_index')]
    public function index(ArtworkRepository $artworkRepository): Response
    {
        $artworks = $artworkRepository->findAll();

        return $this->render('index.html.twig', [
            'artworks' => $artworks,
        ]);
    }

    #[Route('/artworks/{id}', name: 'artwork_show')]
    public function show(ArtworkRepository $artworkRepository, int $id): Response
    {
        $artwork = $artworkRepository->find($id);

        if (!$artwork) {
            throw $this->createNotFoundException('Artwork not found.');
        }

        return $this->render('show.html.twig', [
            'artwork' => $artwork,
        ]);
    }
}