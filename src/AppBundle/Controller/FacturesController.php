<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Dentistes;
use AppBundle\Entity\Factures;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\DentistesType;
use AppBundle\Form\FacturesType;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class FacturesController extends Controller
{
	
 /**
     * Matches /facture exactly
     *
     * @Route("/editer/facture", name="facture_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // Planification de la missions
			$facture = new Factures();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(FacturesType::class, $facture);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $facture->setCreationAt(new \DateTime());
        $facture = $form->getData();
	$message ='Bon de livraison generer avec succes';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($facture);
        $entityManager->flush();
	        return $this->redirectToRoute('facture', ['id'=> $facture->getId()]);
	
    }
	
        return $this->render('factures/creer.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
		/**     *
     * @Route("/factures/liste", name="factures_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Factures');
		
		$facture = $repository->findAll();
		
		return $this->render('factures/liste.html.twig', array('facture'=>$facture));
		
	}





	/**     *
     * @Route("/factures/dan/{id}", name="factures_dan")
     */
	public function moisAction(\DateTime $creation_at)
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Factures');
		
		$debut = new \DateTime($creation_at->format("y-01-d")." 00:00:00");
        $fin = new \DateTime($creation_at->format("y-t-d")." 23:59:59");

        $facture =
        $repository->createQueryBuilder('f')
            ->andWhere('f.creation_at BETWEEN :debut AND :fin' AND 'f.dentiste.id= :id')
            ->setParameter('debut', $debut)
            ->setParameter('fin', $fin)
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
		
		return $this->render('factures/liste.html.twig', array('facture'=>$facture));
		
	}
	
	
		/**     *
* @Route("/facture/{id}", name="facture")
     */
	public function factureAction($id, Request $request)
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Factures');
		
		$facture = $repository->findById($id);
		$path = $request->server->get('DOCUMENT_ROOT');    // C:/wamp64/www/
$path = rtrim($path, "/");  
		
				$snappy = $this->get("knp_snappy.pdf");
				$html = $this->renderView("factures/facture.html.twig", array('facture'=>$facture, 'path' => $path) );
				
				$filename = "Factures";
				
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
     * @Route("/dentistes/factures/{dentistes}", name="dentistes_facture")
     */
  public function factureMensuelAction(Dentistes $dentistes, Request $request)
{        
 $em = $this->container->get('doctrine')->getEntityManager();
 $dentistes= $em->getRepository('AppBundle:Dentistes')->find($dentistes);
 $factures= $em->getRepository('AppBundle:Factures')->findByDentiste($dentistes);

 		$path = $request->server->get('DOCUMENT_ROOT');    // C:/wamp64/www/
		$path = rtrim($path, "/");  
		$snappy = $this->get("knp_snappy.pdf");


$html =  $this->render('factures/facturesDentiste.html.twig', array( 'factures' => $factures, 'dentistes'=>$dentistes, 'path' => $path));

$filename = "FacturesDentiste";
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