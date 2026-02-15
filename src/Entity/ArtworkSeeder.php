<?php

use App\Entity\Artwork;
use DateTime;

require_once 'Artwork.php';

class ArtworkSeeder
{
    /**
     * Seeds example artworks.
     *
     * @return Artwork[] Array of Artwork objects
     */
    public function seed(): array
    {
        $artworksData = [
            new Artwork(
                1,
                'Empowered Cat',
                'Jiln H\'derer',
                new DateTime('1889-06-01'),
                'A famous painting depicting a strong independent cat.',
                '/images/01-image.jpg'
            ),
            new Artwork(
                2,
                'Elephants of the Mahi\'ckl Tribe',
                'Chief Mahu of the Mahi\'ckl Tribe',
                new DateTime('1801-01-01'),
                'A tribal classic.',
                '/images/02-image.jpg'
            ),
            new Artwork(
                3,
                'The Ordeal',
                'Christ Monhandi',
                new DateTime('1931-01-01'),
                'Modern painting featuring a chill dog.',
                '/images/03-image.jpg'
            ),
            new Artwork(
                4,
                'The Ordeal',
                'Christ Monhandi',
                new DateTime('1931-01-01'),
                'Modern painting featuring a chill dog.',
                '/images/04-image.jpg'
            ),
            new Artwork(
                5,
                'The Ordeal',
                'Christ Monhandi',
                new DateTime('1931-01-01'),
                'Modern painting featuring a chill dog.',
                '/images/05-image.jpg'
            ),
            new Artwork(
                6,
                'The Ordeal',
                'Christ Monhandi',
                new DateTime('1931-01-01'),
                'Modern painting featuring a chill dog.',
                '/images/06-image.jpg'
            )
        ];

        $artworks = [];

        foreach ($artworksData as $data) {
            $artwork = new Artwork(
                $data['title'],
                $data['artistName'],
                $data['creationDate'],
                $data['description'],
                $data['imagePath'],
            );

            $artworks[] = $artwork;
        }

        return $artworks;
    }
}
