<?php
// src/AppBundle/Controller/DefaultController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\CategoriesForm;

class CategoriesController extends Controller
{
	
 /**
     * Matches /categories exactly
     *
     * @Route("/categories", name="categories_creer")
     */
    public function creerAction(Request $request)
    {
	$message ='';
 // creation des categories
			$categories = new Categories();

			// On crée le FormBuilder grâce au service form factory
			$form = $this->createForm(CategoriesForm::class, $categories);
						 $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        $categories = $form->getData();
	$message ='Categories enregistré avec succès';
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($categories);
        $entityManager->flush();
	        return $this->render('default/categoriessuccess.html.twig', array(
            'form' => $form->createView(),
        ));
    }
	
        return $this->render('categories/doni.html.twig', array(
            'form' => $form->createView(),
        ));
    }


	
	/**     *
     * @Route("/categories/liste", name="categories_liste")
     */
	public function listeAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Categories');
		
		$categories = $repository->findAll();
		return $this->render('categories/liste.html.twig', array('categories'=>$categories));
	}
	

	
}
?>