<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Vehicules;
use AppBundle\Entity\Conducteurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\VehiculesForm;

class VehiculesController extends Controller
{
	
 /**
     * Matches /vehicules exactly
     *
     * @Route("/vehicules", name="vehicules_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Enregistrement de vehicules
			$vehicules = new Vehicules();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(VehiculesForm::class, $vehicules);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $vehicules = $form->getData();
	$message ='Vehicule enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($vehicules);
        $entityManager->flush();
	        return $this->render('default/vehiculesuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('vehicules/doni.html.twig', array(
            'form' => $form->createView(),'vehicules'=>$vehicules
        ));
    }
	
	
		
	/**     *
     * @Route("/vehicules/liste", name="vehicules_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Vehicules');
		
		$vehicules = $repository->findAll();
		return $this->render('vehicules/liste.html.twig', array('vehicules'=>$vehicules));
		
	}
	
	
}
?>