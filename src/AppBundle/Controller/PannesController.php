<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Pannes;
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
use AppBundle\Form\PannesForm;

class PannesController extends Controller
{
	
 /**
     * Matches /pannes exactly
     *
     * @Route("/declaration/pannes", name="pannes_declaration")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Planification des pannes
			$pannes = new Pannes();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(PannesForm::class, $pannes);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $pannes = $form->getData();
	$message ='panne declarer avec succes';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($pannes);
        $entityManager->flush();
	        return $this->render('default/pannessuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('pannes/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		/**     *
     * @Route("/pannes/liste", name="pannes_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Pannes');
		
		$pannes = $repository->findAll();
		return $this->render('pannes/liste.html.twig', array('pannes'=>$pannes));
		
	}
	
}
?>