<?php
// src/Controller/ArtworkController.php

namespace App\Controller;

use App\Repository\ArtworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Form\ArtworkType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Artwork;

class ArtworkController extends AbstractController
{
    #[Route('/artworks', name: 'artwork_index')]
    public function index(Request $request, ArtworkRepository $artworkRepository): Response
    {
        $sort = $request->query->get('sort', 'ASC');
        $search = $request->query->get('search', '');

        if ($search) {
            $artworks = $artworkRepository->findByTitle($search);
        } else {
            $artworks = $artworkRepository->findAllSortedByDate($sort);
        }

        return $this->render('index.html.twig', [
            'artworks' => $artworks,
            'sort' => $sort,
            'search' => $search,
        ]);
    }

    #[Route('/artworks/new', name: 'artwork_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $artwork = new Artwork();
        $form = $this->createForm(ArtworkType::class, $artwork);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($artwork);
            $em->flush();

            return $this->redirectToRoute('artwork_index');
        }

        return $this->render('new.html.twig', [
            'form' => $form->createView(),
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

    #[Route('/artworks/{id}/edit', name: 'artwork_edit')]
    public function edit(Request $request, EntityManagerInterface $em, ArtworkRepository $artworkRepository, int $id): Response
    {
        $artwork = $artworkRepository->find($id);

        if (!$artwork) {
            throw $this->createNotFoundException('Artwork not found.');
        }

        $form = $this->createForm(ArtworkType::class, $artwork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('artwork_index');
        }

        return $this->render('edit.html.twig', [
            'form' => $form->createView(),
            'artwork' => $artwork,
        ]);
    }

    #[Route('/artworks/{id}/delete', name: 'artwork_delete')]
    public function delete(Request $request, EntityManagerInterface $em, ArtworkRepository $artworkRepository, int $id): Response
    {
        $artwork = $artworkRepository->find($id);

        if (!$artwork) {
            throw $this->createNotFoundException('Artwork not found.');
        }

        if ($request->isMethod('POST')) {
            $em->remove($artwork);
            $em->flush();

            return $this->redirectToRoute('artwork_index');
        }

        return $this->render('delete.html.twig', [
            'artwork' => $artwork,
        ]);
    }
}
