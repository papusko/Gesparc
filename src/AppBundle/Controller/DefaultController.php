<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Assurances;
use AppBundle\Entity\VisiteTechnique;
use AppBundle\Entity\Vignettes;
use AppBundle\Entity\Vehicules;

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
     * @Route("/index", name="tableau_de_bord")
     */
    public function pageAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/accueil.html.twig');
    }
	
	
	/**
     * @Route("/rapport", name="rapport_par_mois")
     */
	public function rapAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
$vehicules = new Vehicules();
		
        $vehicules = 'SELECT * FROM vehicules where immatriculation = "s 6755 MD"';
        
        $statement = $em->getConnection()->prepare($vehicules);
        $statement->execute();

        $result = $statement->fetchAll();
		
		 return $this->render('vehicules/liste.html.twig',array(
            'vehicules'=>$vehicules 
        ));
    }
	
		 /**
     * @Route("/gestion/entretien", name="gestion_entretien")
     */
    public function entretienAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/entretien.html.twig');
    }
	
	
			 /**
     * @Route("/gestion/vehicules", name="gestion_vehicules")
     */
    public function vehiculeAction(Request $request)
    {
		$assurances = new Assurances();
		$vignettes = new Vignettes();
		$visites = new VisiteTechnique();
        // replace this example code with whatever you need
        return $this->render('default/vehicules.html.twig',array(
             'assurances'=>$assurances, 'vignettes'=>$vignettes,'visites'=>$visites 
        ) );
    }
	
	
				 /**
     * @Route("/gestion/missions", name="gestion_missions")
     */
    public function missionsAction(Request $request)
    {
		
        // replace this example code with whatever you need
        return $this->render('default/missions.html.twig');
    }
}
