<?php
// src/AppBundle/Form/TaskType.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Vehicules;
use AppBundle\Entity\Conducteurs;
use AppBundle\Entity\Categories;
use AppBundle\Entity\Assurances;
use AppBundle\Entity\VisiteTechnique;
use AppBundle\Entity\Permis;
use AppBundle\Entity\Services;
use AppBundle\Entity\Acquisition;
use AppBundle\Entity\Accessoires;
use AppBundle\Entity\Vidanges;
use AppBundle\Entity\Equipements;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccessoiresForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
						->add('filtreAHuile', ChoiceType::class, array(
								'label' => 'Filtre à huile',
									'choices' => array(
										'Oui' => 'oui',
										'Non' => 'nom',
										)))
						->add('filtreAGasoil', ChoiceType::class, array(
								'label' => 'Filtre à gasoil',
									'choices' => array(
										'Oui' => 'oui',
										'Non' => 'nom',
										)))
						->add('filtreAAir', ChoiceType::class, array(
								'label' => 'Filtre à air',
									'choices' => array(
										'Oui' => 'oui',
										'Non' => 'nom',
										)))
						->add('filtreClim', ChoiceType::class, array(
								'label' => 'Filtre à clim',
									'choices' => array(
										'Oui' => 'oui',
										'Non' => 'nom',
										)))
						->add('vehicules', EntityType::class, array(
						'class'=>'AppBundle\Entity\Vehicules',
						'choice_label'=>'immatriculation',
						'expanded'=>false,
						'multiple'=>false))
	
						->add('save', SubmitType::class, array('label' => 'Enregistrer accessoire'))
        ;
    }
public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Accessoires::class,
        ));
    }
 
}