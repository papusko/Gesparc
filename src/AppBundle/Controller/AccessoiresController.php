<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Accessoires;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\AccessoiresForm;

class AccessoiresController extends Controller
{
	
 /**
     * Matches /accessoires exactly
     *
     * @Route("/accessoires", name="accessoires_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // creation des accessoires
			$accessoires = new Accessoires();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(AccessoiresForm::class, $accessoires);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $accessoires = $form->getData();
	$message ='accessoires enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($accessoires);
        $entityManager->flush();
	        return $this->render('default/accessoiressuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('accessoires/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }


	
	/**     *
     * @Route("/accessoires/liste", name="accessoires_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Accessoires');
		
		$accessoires = $repository->findAll();
		return $this->render('accessoires/liste.html.twig', array('accessoires'=>$accessoires));
	}
	

	
}
?>