<?php
// src/AppBundle/Form/TaskType.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
//use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Vehicules;
use AppBundle\Entity\Conducteurs;
use AppBundle\Entity\Categories;
use AppBundle\Entity\Assurances;
use AppBundle\Entity\VisiteTechnique;
use AppBundle\Entity\Permis;
use AppBundle\Entity\Services;
use AppBundle\Entity\Acquisition;
use AppBundle\Entity\Vidanges;
use AppBundle\Entity\Pannes;
use AppBundle\Entity\Accessoires;
use AppBundle\Entity\Equipements;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PannesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
						->add('dateDeclaration', DateType::class)
						->add('conducteurs', EntityType::class, array(
						'class'=>'AppBundle\Entity\Conducteurs',
						'choice_label'=>'nom',
						'expanded'=>false,
						'multiple'=>false))
						->add('vehicules', EntityType::class, array(
						'class'=>'AppBundle\Entity\Vehicules',
						'choice_label'=>'immatriculation',
						'expanded'=>false,
						'multiple'=>false))
						->add('pannes', TextareaType::class)
						->add('save', SubmitType::class, array('label' => 'Declarez la panne'))
        ;
    }
public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Pannes::class,
        ));
    }
 
}