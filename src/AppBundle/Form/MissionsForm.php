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
use AppBundle\Entity\Missions;
use AppBundle\Entity\Services;
use AppBundle\Entity\Acquisition;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MissionsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
						->add('TypeMissions', TextType::class,array('label' => 'Lieu de la mission'))
						->add('ObjetMissions',  TextType::class,['attr'=>['placeholder'=>'Objet de la mission'] ])
						
						->add('dateDebut', DateType::class)
						->add('dateFin', DateType::class)
						->add('vehicules', EntityType::class, array(
						'class'=>'AppBundle\Entity\Vehicules',
						'choice_label'=>'immatriculation',
						'expanded'=>false,
						'multiple'=>false))
						->add('conducteurs', EntityType::class, array(
						'class'=>'AppBundle\Entity\Conducteurs',
						'choice_label'=>'nom',
						'expanded'=>false,
						'multiple'=>false))
						
						
						->add('save', SubmitType::class, array('label' => 'Valider mission'))
        ;
    }
public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Missions::class,
        ));
    }
 
}