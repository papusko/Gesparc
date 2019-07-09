<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Acquisition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\AcquisitionForm;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class AcquisitionController extends Controller
{
	
 /**
     * Matches /acquisition exactly
     *
     * @Route("/acquisition", name="acquisition_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // creation des types d'acquisition
			$acquisition = new Acquisition();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(AcquisitionForm::class, $acquisition);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $acquisition = $form->getData();
	$message ='Type d\'acquisition ajoutée avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($acquisition);
        $entityManager->flush();
		return new PdfResponse(
            $this->get('knp_snappy.pdf')->getOutput('default/liste.html.twig'),
            'file.pdf'
        );
    }
	
        return $this->render('acquisition/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		/**     *
     * @Route("/acquisition/liste", name="acquisition_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Acquisition');
		
		$acquisition = $repository->findAll();
		return $this->render('acquisition/liste.html.twig', array('acquisition'=>$acquisition));
		
	}
	
}
?>