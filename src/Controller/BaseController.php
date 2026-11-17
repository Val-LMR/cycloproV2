<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\AjoutReparationType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\reparation;
use Doctrine\ORM\EntityManagerInterface;


final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
        ]);
    }

    #[Route('/reparation', name: 'app_reparation')]
    public function reparation(Request $request, EntityManagerInterface $em): Response
    {   
        $reparation = new Reparation();
        $form=$this->createForm(AjoutReparationType::class, $reparation);
        if($request>isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $reparation->setDateDepot(new \DateImmutable);

                $em->persist($reparation);
                $em->flush();
                $this->addFlash('notice', 'Votre demande a bien été envoyé.');
                return $this->redirectToRoute('app_accueil');
            }
        }
        return $this->render('base/reparation.html.twig', [
            'form'=>$form
        ]);
    }
}
