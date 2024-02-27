<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Candidature;
use AppBundle\Form\CandidatureType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/about.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/projects", name="projects")
     */
    public function projectsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/projects.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/contact.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/services", name="services")
     */
    public function servicesAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/services.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blogAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/blog.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/formation-assistanat", name="formation-assistanat")
     */
    public function assistanatAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/formation-assistanat.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

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
