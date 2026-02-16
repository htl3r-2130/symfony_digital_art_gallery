<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArtworkController extends AbstractController
{
    private array $artworks = [
        [
            'id' => 1,
            'title' => 'Empowered Cat',
            'artistName' => 'Jiln H\'derer',
            'creationDate' => '1889-06-01',
            'description' => 'A famous painting depicting a strong independent cat.',
            'imagePath' => '/images/01-image.jpg',
        ],
        [
            'id' => 2,
            'title' => 'Elephants of the Mahi\'ckl Tribe',
            'artistName' => 'Chief Mahu of the Mahi\'ckl Tribe',
            'creationDate' => '1801-01-01',
            'description' => 'A tribal classic.',
            'imagePath' => '/images/02-image.jpg',
        ],
        [
            'id' => 3,
            'title' => 'The Ordeal',
            'artistName' => 'Christ Monhandi',
            'creationDate' => '1931-01-01',
            'description' => 'Modern painting featuring a chill dog.',
            'imagePath' => '/images/03-image.jpg',
        ],
        [
            'id' => 4,
            'title' => 'Face of the Moon',
            'artistName' => 'Patrizio Mauro',
            'creationDate' => '1998-02-01',
            'description' => 'Lush lips.',
            'imagePath' => '/images/04-image.jpg',
        ],
        [
            'id' => 5,
            'title' => 'German Minds',
            'artistName' => 'Friedrick Bognatter',
            'creationDate' => '1931-01-01',
            'description' => 'Difficult times at linguistic college.',
            'imagePath' => '/images/05-image.jpg',
        ],
        [
            'id' => 6,
            'title' => 'Siberian Swing',
            'artistName' => 'Ali Mandi',
            'creationDate' => '1999-10-01',
            'description' => 'Celebratting tiger culture.',
            'imagePath' => '/images/06-image.jpg',
        ]
    ];

    #[Route('/artwork/current', name: 'currentArtwork')]
    public function currentArtwork(): Response
    {
        return $this->render('artwork/artwork.html.twig', [
            'artwork' => $this->artworks[0]
        ]);
    }

    #[Route("/artwork", name: "allArtworks")]
    public function allArtworks(): Response
    {
        return $this->render("artwork/all.html.twig", [
            'artworks' => $this->artworks
        ]);
    }

    #[Route('/artwork/{id}', name: 'idArtwork')]
    public function artworkById(int $id): Response
    {
        if (!isset($this->artworks[$id - 1])) {
            throw $this->createNotFoundException('Artwork not found');
        }

        return $this->render('artwork/artwork.html.twig', [
            'controller_name' => 'ArtworkController',
            'artwork' => $this->artworks[$id - 1]
        ]);
    }
}
