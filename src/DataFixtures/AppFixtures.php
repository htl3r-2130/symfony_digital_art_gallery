<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Artist;
use App\Entity\Artwork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\VirtualTours;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername("admin");
        $user->setRoles(["USER_ROLE"]);
        $manager->persist($user);


        $artist1 = new Artist();
        $artist1->setFirstName('Jiln');
        $artist1->setLastname("H'derer");
        $artist1->setBirthDate(new \DateTime('1850-01-01'));
        $manager->persist($artist1);

        $artist2 = new Artist();
        $artist2->setFirstName('Chief Mahu');
        $artist2->setLastname("of the Mahi'ckl Tribe");
        $artist2->setBirthDate(new \DateTime('1770-01-01'));
        $manager->persist($artist2);

        $artist3 = new Artist();
        $artist3->setFirstName('Christ');
        $artist3->setLastname('Monhandi');
        $artist3->setBirthDate(new \DateTime('1900-01-01'));
        $manager->persist($artist3);

        $artist4 = new Artist();
        $artist4->setFirstName('Patrizio');
        $artist4->setLastname('Mauro');
        $artist4->setBirthDate(new \DateTime('1960-01-01'));
        $manager->persist($artist4);

        $artist5 = new Artist();
        $artist5->setFirstName('Friedrick');
        $artist5->setLastname('Bognatter');
        $artist5->setBirthDate(new \DateTime('1895-01-01'));
        $manager->persist($artist5);

        $artwork1 = new Artwork();
        $artwork1->setTitle('Empowered Cat');
        $artwork1->setDescription('A famous painting depicting a strong independent cat.');
        $artwork1->setImagePath('/images/01-image.jpg');
        $artwork1->setCreationDate(new \DateTime('1889-06-01'));
        $artwork1->setArtist($artist1);
        $manager->persist($artwork1);

        $artwork2 = new Artwork();
        $artwork2->setTitle('Elephants of the Mahi\'ckl Tribe');
        $artwork2->setDescription('A tribal classic.');
        $artwork2->setImagePath('/images/02-image.jpg');
        $artwork2->setCreationDate(new \DateTime('1801-01-01'));
        $artwork2->setArtist($artist2);
        $manager->persist($artwork2);

        $artwork3 = new Artwork();
        $artwork3->setTitle('The Ordeal');
        $artwork3->setDescription('Modern painting featuring a chill dog.');
        $artwork3->setImagePath('/images/03-image.jpg');
        $artwork3->setCreationDate(new \DateTime('1931-01-01'));
        $artwork3->setArtist($artist3);
        $manager->persist($artwork3);

        $artwork4 = new Artwork();
        $artwork4->setTitle('Face of the Moon');
        $artwork4->setDescription('Lush lips.');
        $artwork4->setImagePath('/images/04-image.jpg');
        $artwork4->setCreationDate(new \DateTime('1998-02-01'));
        $artwork4->setArtist($artist4);
        $manager->persist($artwork4);

        $artwork5 = new Artwork();
        $artwork5->setTitle('German Minds');
        $artwork5->setDescription('Difficult times at linguistic college.');
        $artwork5->setImagePath('/images/05-image.jpg');
        $artwork5->setCreationDate(new \DateTime('1931-01-01'));
        $artwork5->setArtist($artist5);
        $manager->persist($artwork5);

        $tour1 = new VirtualTours();
        $tour1->setTitle('Classic Masters');
        $tour1->setDescription('A tour through classical artworks.');
        $tour1->addArtwork($artwork1);
        $tour1->addArtwork($artwork2);
        $manager->persist($tour1);

        $tour2 = new VirtualTours();
        $tour2->setTitle('Modern Expressions');
        $tour2->setDescription('Contemporary art from the 20th century.');
        $tour2->addArtwork($artwork3);
        $tour2->addArtwork($artwork4);
        $tour2->addArtwork($artwork5);
        $manager->persist($tour2);

        $manager->flush();
    }
}
