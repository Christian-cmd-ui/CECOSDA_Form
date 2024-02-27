<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Candidature;
use AppBundle\Form\CandidatureType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CandidatureController extends Controller
{
    /**
     * @Route("/formateur", name="formateur")
     */
    public function candidatureAction(Request $request)
    {
        $candidature = new Candidature();
        $form = $this->createForm(CandidatureType::class, $candidature);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Gérer l'upload du CV
            $cvFile = $candidature->getCv();
            $cvFileName = md5(uniqid()).'.'.$cvFile->guessExtension();
            $cvFile->move(
                $this->getParameter('cv_directory'),
                $cvFileName
            );
            $candidature->setCv($cvFileName);

            // Gérer l'upload de la photo
            $photoFile = $candidature->getPhoto();
            $photoFileName = md5(uniqid()).'.'.$photoFile->guessExtension();
            $photoFile->move(
                $this->getParameter('photo_directory'),
                $photoFileName
            );
            $candidature->setPhoto($photoFileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($candidature);
            $em->flush();

            return $this->redirectToRoute('candidature_success');
        }

        return $this->render('default/formateur.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
