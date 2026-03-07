<?php
namespace App\Controller;

use App\Repository\VirtualToursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VirtualTourController extends AbstractController
{
    #[Route('/tours', name: 'tour_index')]
    public function index(VirtualToursRepository $virtualToursRepository): Response
    {
        return $this->render('tour/index.html.twig', [
            'tours' => $virtualToursRepository->findAll(),
        ]);
    }

    #[Route('/tours/{id}', name: 'tour_show')]
    public function show(VirtualToursRepository $virtualToursRepository, int $id): Response
    {
        $tour = $virtualToursRepository->find($id);

        if (!$tour) {
            throw $this->createNotFoundException('Tour not found.');
        }

        return $this->render('tour/show.html.twig', [
            'tour' => $tour,
        ]);
    }
}