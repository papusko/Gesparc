<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Dentistes;
use AppBundle\Entity\BonLivraison;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\DentistesType;
use AppBundle\Form\BonLivraisonType;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class BonLivraisonController extends Controller
{
	
 /**
     * Matches /bonlivraison exactly
     *
     * @Route("/editer/bonlivraison", name="bon_livraison_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Planification de la missions
			$bonli = new BonLivraison();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(BonLivraisonType::class, $bonli);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $bonli->setCreationAt(new \DateTime());
        $bonli = $form->getData();
	$message ='Bon de livraison generer avec succes';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($bonli);
        $entityManager->flush();
	        return $this->redirectToRoute('bon_de_livraison', ['id'=> $bonli->getId()]);
	
    }
	
        return $this->render('bon_livraison/creer.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		/**     *
     * @Route("/bon/livraison", name="bon_livraison_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:BonLivraison');
		
		$bonli = $repository->findAll();
		
		return $this->render('bon_livraison/liste.html.twig', array('bonli'=>$bonli));
		
	}


	/**     *
     * @Route("/bonlivraison/modifier/{id}", name="livraison_modifier")
     */
    public function modifier(Request $request, BonLivraison $bonli)
    {
    	
        $form = $this->createForm(BonLivraisonType::class, $bonli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $bonli = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            //$entityManager->persist($secteur);
            $entityManager->persist($bonli);
            $entityManager->flush();
            return $this->redirectToRoute('bon_de_livraison', ['id'=> $bonli->getId()]);
        }
        return $this->render('bon_livraison/modifier.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	



	
		/**     *
* @Route("/bon/de/livraison/{id}", name="bon_de_livraison")
     */
	public function bonAction($id, Request $request)
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:BonLivraison');
		
		$bonli = $repository->findById($id);
		$path = $request->server->get('DOCUMENT_ROOT');    // C:/wamp64/www/
$path = rtrim($path, "/");  
		
				$snappy = $this->get("knp_snappy.pdf");
				$html = $this->renderView("bon_livraison/bonlivraison.html.twig", array('bonli'=>$bonli, 'path' => $path) );
				
				$filename = "bonDeLivraison";
				
				return new Response (
										$snappy->getOutputFromHtml($html),
										200,
										array(
												'Content-Type'=>'application/pdf',
												'Content-Disposition' => 'inline; filename="'.$filename.'.pdf"'		
											)										
									);
	
		
		
	}
	
}
?>