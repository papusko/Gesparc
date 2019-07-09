<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\VisiteTechnique;
use AppBundle\Entity\Vehicules;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\VisiteTechniqueForm;

class VisiteTechniqueController extends Controller
{
	
 /**
     * Matches /visitec exactly
     *
     * @Route("/visitetechnique", name="visitetechni_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Enregistrement des visite technique
			$visites = new VisiteTechnique();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(VisiteTechniqueForm::class, $visites);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $visites = $form->getData();
	$message ='Vignette enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($visites);
        $entityManager->flush();
	        return $this->render('default/visitesuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('visites/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		
	/**     *
     * @Route("/visite/liste", name="visite_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:VisiteTechnique');
		
		$visites = $repository->findAll();
		return $this->render('visites/liste.html.twig', array('visites'=>$visites));
		
	}
	
	
}
?>