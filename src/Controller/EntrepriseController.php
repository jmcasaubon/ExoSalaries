<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprises")
 */
class EntrepriseController extends AbstractController
{
    /**
     * @Route("/", name="entreprises_index")
     */
    public function index()
    {
        $entreprises = $this->getDoctrine()
                        ->getRepository(Entreprise::class)
                        ->getAll() ;

        return $this->render('entreprise/index.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }

    /**
     * @Route("/{id}", name="entreprises_show", methods="GET")
     */
    public function show(entreprise $entreprise): Response
    {
        return $this->render('entreprise/show.html.twig', [
            'entreprise' => $entreprise,
        ]);
    }
}
