<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Equipements;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\EquipementsForm;

class EquipementController extends Controller
{
	
 /**
     * Matches /equipements exactly
     *
     * @Route("/equipements", name="equipements_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // creation des equipements
			$equipements = new Equipements();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(EquipementsForm::class, $equipements);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $equipements = $form->getData();
	$message ='equipements enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($equipements);
        $entityManager->flush();
	        return $this->render('default/equipementssuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('equipements/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }


	
	/**     *
     * @Route("/equipements/liste", name="equipements_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Equipements');
		
		$equipements = $repository->findAll();
		return $this->render('equipements/liste.html.twig', array('equipements'=>$equipements));
	}
	

	
}
?>