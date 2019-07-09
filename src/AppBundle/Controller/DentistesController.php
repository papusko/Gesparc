<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Dentistes;
use AppBundle\Entity\Factures;
use AppBundle\Repository\FacturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\DentistesType;

class DentistesController extends Controller
{
	
 /**
     * Matches /dentistes exactly
     *
     * @Route("/dentistes", name="dentistes_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Enregistrement des dentistes
			$dentistes = new Dentistes();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(DentistesType::class, $dentistes);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $dentistes = $form->getData();
	$message ='Dentiste ajouté avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($dentistes);
        $entityManager->flush();
        return $this->redirectToRoute('dentistes_liste');
    }
	
        return $this->render('dentistes/creer.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		
	/**     *
     * @Route("/dentistes/liste", name="dentistes_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Dentistes');
		$dentistes = new Dentistes();		
		$dentistes = $repository->findAll();
		return $this->render('dentistes/liste.html.twig', array('dentistes'=>$dentistes));
		
		
		
	}



		/**     *
     * @Route("/facture/mensuel", name="facture_du_mois")
     */
	public function moisAction()
	{
		 $em = $this->container->get('doctrine')->getEntityManager();
		$repository = $this->getDoctrine()->getRepository('AppBundle:Dentistes');
		
		$dentistes = $repository->findByMois();
		return $this->render('factures/facturesDentiste.html.twig', array('dentistes'=>$dentistes));
		
		
		
	}
	


	
}
?>