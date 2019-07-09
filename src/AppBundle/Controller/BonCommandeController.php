<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Dentistes;
use AppBundle\Entity\BonCommandes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\DentistesType;
use AppBundle\Form\BonCommandeType;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class BonCommandeController extends Controller
{
	
 /**
     * Matches /boncommande exactly
     *
     * @Route("/editer/boncommande", name="bon_commande_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Planification de la missions
			$bon = new BonCommandes();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(BonCommandeType::class, $bon);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $bon->setCreationAt(new \DateTime());
        $bon = $form->getData();
	$message ='Bon de commande generer avec succes';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($bon);
        $entityManager->flush();
	        return $this->redirectToRoute('bon_de_commandes', ['id'=> $bon->getId()]);
	
    }
	
        return $this->render('bon_commande/creer.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		/**     *
     * @Route("/bon/commande", name="bon_commande_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:BonCommandes');
		
		$bon = $repository->findAll();
		
		return $this->render('bon_commande/liste.html.twig', array('bon'=>$bon));
		
	}
	
	
		/**     *
* @Route("/bon/de/commandes/{id}", name="bon_de_commandes")
     */
	public function bonAction($id, Request $request)
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:BonCommandes');
		
		$bon = $repository->findById($id);
		$path = $request->server->get('DOCUMENT_ROOT');    // C:/wamp64/www/
$path = rtrim($path, "/");  
		
				$snappy = $this->get("knp_snappy.pdf");
				$html = $this->renderView("bon_commande/boncommande.html.twig", array('bon'=>$bon, 'path' => $path) );
				
				$filename = "bonDeCommande";
				
				return new Response (
										$snappy->getOutputFromHtml($html),
										200,
										array(
												'Content-Type'=>'application/pdf',
												'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'		
											)										
									);
	
		
		
	}



	 


	     /**     *
     * @Route("/boncommande/modifier/{id}", name="bon_modifier")
     */
    public function modifier(Request $request, BonCommandes $bon)
    {
    	
        $form = $this->createForm(BonCommandeType::class, $bon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $bon = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($secteur);
            $entityManager->persist($bon);
            $entityManager->flush();
            return $this->redirectToRoute('bon_de_commandes', ['id'=> $bon->getId()]);
        }
        return $this->render('bon_commande/modifier.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
}
?>