<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    #[Route('/artists', name: 'artist_index')]
    public function index(ArtistRepository $artistRepository): Response
    {
        return $this->render('artist/index.html.twig', [
            'artists' => $artistRepository->findAll(),
        ]);
    }

    #[Route('/artists/{id}', name: 'artist_show')]
    public function show(ArtistRepository $artistRepository, int $id): Response
    {
        $artist = $artistRepository->find($id);

        if (!$artist) {
            throw $this->createNotFoundException('Artist not found.');
        }

        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
        ]);
    }
}