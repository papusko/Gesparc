<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Conducteurs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ConducteursForm;

class ConducteursController extends Controller
{
	
 /**
     * Matches /conducteurs exactly
     *
     * @Route("/conducteurs", name="conducteurs_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Enregistrement de conducteurs
			$conducteurs = new Conducteurs();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(ConducteursForm::class, $conducteurs);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $conducteurs = $form->getData();
	$message ='Conducteur ajouté avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($conducteurs);
        $entityManager->flush();
	        return $this->render('default/conducteursuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('conducteurs/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		
	/**     *
     * @Route("/conducteurs/liste", name="conducteurs_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Conducteurs');
		
		$conducteurs = $repository->findAll();
		return $this->render('conducteurs/liste.html.twig', array('conducteurs'=>$conducteurs));
		
		
		
	}
	
	
}
?>