<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Assurances;
use AppBundle\Entity\Vehicules;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\AssurancesForm;

class AssurancesController extends Controller
{
	
 /**
     * Matches /assurances exactly
     *
     * @Route("/assurances", name="assurances_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Enregistrement des assurances
			$assurances = new Assurances();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(AssurancesForm::class, $assurances);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $assurances = $form->getData();
	$message ='Assurance enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($assurances);
        $entityManager->flush();
	        return $this->render('default/assurancesuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('assurances/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		
	/**     *
     * @Route("/assurances/liste", name="assurances_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Assurances');
		
		$assurances = $repository->findAll();
		return $this->render('assurances/liste.html.twig', array('assurances'=>$assurances));
		
	}
	
	
}
?>