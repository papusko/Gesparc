<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Services;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\ServicesForm;

class ServicesController extends Controller
{
	
 /**
     * Matches /services exactly
     *
     * @Route("/services", name="services_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // creation des services
			$services = new Services();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(ServicesForm::class, $services);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $services = $form->getData();
	$message ='Secteur enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($services);
        $entityManager->flush();
	        return $this->render('default/servicesuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('services/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }


	
	/**     *
     * @Route("/services/liste", name="services_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Services');
		
		$services = $repository->findAll();
		return $this->render('services/liste.html.twig', array('services'=>$services));
	}
	

	
}
?>