<?php
// src/AppBundle/Form/TaskType.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('immatriculation', TextType::class,['attr'=>['placeholder'=>'Numero d\'immatriculation'] ] )
						->add('numeroDeChassis', TextType::class,  ['attr'=>['placeholder'=>'Numero de chassis'] ])
						->add('dateMiseCirculation', DateType::class)
						->add('couleur', TextType::class,['attr'=>['placeholder'=>'couleur de la voiture'] ])
						->add('marques', TextType::class,['attr'=>['placeholder'=>'marque de la voiture'] ])
						->add('etat', TextType::class,['attr'=>['placeholder'=>'etat de la voiture'] ])
						->add('type', TextType::class,['attr'=>['placeholder'=>'type de la voiture'] ])
						->add('nombrePlace', TextType::class,['attr'=>['placeholder'=>'nombre de place dans la voiture'] ])
						->add('categories', EntityType::class, array(
						'class'=>'AppBundle\Entity\Categories',
						'choice_label'=>'typeCategorie',
						'expanded'=>false,
						'multiple'=>false))
						->add('acquisition', EntityType::class, array(
						'class'=>'AppBundle\Entity\Acquisition',
						'choice_label'=>'typeAcquision',
						'expanded'=>false,
						'multiple'=>false))
						->add('conducteurs', EntityType::class, array(
						'class'=>'AppBundle\Entity\Conducteurs',
						'choice_label'=>'nom',
						'expanded'=>false,
						'multiple'=>false))
						->add('save', SubmitType::class, array('label' => 'Enregistrer la voiture'))
        ;
    }
public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Vehicules::class,
        ));
    }
 
}