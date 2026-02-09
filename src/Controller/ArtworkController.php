<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use \DateTime;

final class ArtworkController extends AbstractController
{
    #[Route('/artwork/current', name: 'currentArtwork')]
    public function currentArtwork(): Response
    {
        return $this->render('artwork/current.html.twig', [
            'controller_name' => 'ArtworkController',
            'artwork' => [
                'title' => 'Empowered Cat',
                'artistName' => 'Jiln H\'derer',
                'creationDate' => new DateTime('1889-06-01'),
                'description' => 'A famous painting depicting a strong independent cat.',
                'imagePath' => '/images/01-image.jpg',
            ]
        ]);
    }

    #[Route('/artwork/{id}', name: 'artworks')]
    public function artworkById(): Response
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'ArtworkController',
            'artworks' => [
                [
                    'title' => 'Empowered Cat',
                    'artistName' => 'Jiln H\'derer',
                    'creationDate' => new DateTime('1889-06-01'),
                    'description' => 'A famous painting depicting a strong independent cat.',
                    'imagePath' => '/images/01-image.jpg',
                ],
                [
                    'title' => 'Elephants of the Mahi\'ckl Tribe',
                    'artistName' => 'Chief Mahu of the Mahi\'ckl Tribe',
                    'creationDate' => new DateTime('1801-01-01'),
                    'description' => 'A tribal classic.',
                    'imagePath' => '/images/02-image.jpg',
                ],
                [
                    'title' => 'The Ordeal',
                    'artistName' => 'Christ Monhandi',
                    'creationDate' => new DateTime('1931-01-01'),
                    'description' => 'Modern painting featuring a chill dog.',
                    'imagePath' => '/images/03-image.jpg',
                ],
                [
                    'title' => 'The Ordeal',
                    'artistName' => 'Christ Monhandi',
                    'creationDate' => new DateTime('1931-01-01'),
                    'description' => 'Modern painting featuring a chill dog.',
                    'imagePath' => '/images/04-image.jpg',
                ],
                [
                    'title' => 'The Ordeal',
                    'artistName' => 'Christ Monhandi',
                    'creationDate' => new DateTime('1931-01-01'),
                    'description' => 'Modern painting featuring a chill dog.',
                    'imagePath' => '/images/05-image.jpg',
                ],
                [
                    'title' => 'The Ordeal',
                    'artistName' => 'Christ Monhandi',
                    'creationDate' => new DateTime('1931-01-01'),
                    'description' => 'Modern painting featuring a chill dog.',
                    'imagePath' => '/images/06-image.jpg',
                ]
            ],
        ]);
    }
}
