<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Vignettes;
use AppBundle\Entity\Vehicules;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\VignettesForm;

class VignettesController extends Controller
{
	
 /**
     * Matches /assurances exactly
     *
     * @Route("/vignettes", name="vignettes_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Enregistrement des vignettes
			$vignettes = new Vignettes();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(VignettesForm::class, $vignettes);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $vignettes = $form->getData();
	$message ='Vignette enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($vignettes);
        $entityManager->flush();
	        return $this->render('default/vignettesuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('vignettes/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
	
		
	/**     *
     * @Route("/vignettes/liste", name="vignettes_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Vignettes');
		
		$vignettes = $repository->findAll();
		return $this->render('vignettes/liste.html.twig', array('vignettes'=>$vignettes));
		
		
		
	}
	
}
?>