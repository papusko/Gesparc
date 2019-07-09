<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Missions;
use AppBundle\Entity\Vehicules;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\MissionsForm;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class MissionsController extends Controller
{
	
 /**
     * Matches /missions exactly
     *
     * @Route("/missions", name="missions_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Planification de la missions
			$missions = new Missions();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(MissionsForm::class, $missions);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $missions = $form->getData();
	$message ='Missions planifié avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($missions);
        $entityManager->flush();
	        return $this->redirectToRoute('ordre_de_missions', ['id'=> $missions->getId()]);
	
    }
	
        return $this->render('missions/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		/**     *
     * @Route("/missions/liste", name="missions_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Missions');
		
		$missions = $repository->findAll();
		
		return $this->render('missions/liste.html.twig', array('missions'=>$missions));
		
	}
	
	
		/**     *
* @Route("/ordre/de/missions/{id}", name="ordre_de_missions")
     */
	public function ordremiAction($id, Request $request)
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Missions');
		
		$missions = $repository->findById($id);
		$path = $request->server->get('DOCUMENT_ROOT');    // C:/wamp64/www/
$path = rtrim($path, "/");  
		
				$snappy = $this->get("knp_snappy.pdf");
				$html = $this->renderView("missions/ordre.html.twig", array('missions'=>$missions, 'path' => $path) );
				
				$filename = "missions";
				
				return new Response (
										$snappy->getOutputFromHtml($html),
										200,
										array(
												'Content-Type'=>'application/pdf',
												'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'		
											)										
									);
	
		
		
	}
	
}
?>