<?php

require_once 'Artwork.php'; // Make sure to include the Artwork class

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
            ],
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