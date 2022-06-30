<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ConferenceController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Environment $twig, ConferenceRepository $conferenceRepository): Response
    {
        return new Response($twig->render('conference/index.html.twig', [
                        'conferences' => $conferenceRepository->findAll(),
        ]));
        return $this->render('conference/index.html.twig', [
            'controller_name' => 'ConferenceController',
        ]);
    }

    public function detail(Environment $twig, ConferenceRepository $conferenceRepository, CommentRepository $commentRepository)
    {
        
    }
}
