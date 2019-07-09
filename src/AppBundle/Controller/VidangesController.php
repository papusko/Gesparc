<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Vidanges;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\VidangesForm;

class VidangesController extends Controller
{
	
 /**
     * Matches /vidanges exactly
     *
     * @Route("/vidanges", name="vidanges_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // creation des vidanges
			$vidanges = new Vidanges();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(VidangesForm::class, $vidanges);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $vidanges = $form->getData();
	$message ='vidanges enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($vidanges);
        $entityManager->flush();
	        return $this->render('default/vidangessuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('vidanges/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }


	
	/**     *
     * @Route("/vidanges/liste", name="vidanges_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Vidanges');
		
		$Vidanges = $repository->findAll();
		return $this->render('vidanges/liste.html.twig', array('vidanges'=>$vidanges));
	}
	

	
}
?>