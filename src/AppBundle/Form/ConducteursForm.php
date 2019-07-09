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

class ConducteursForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
						->add('nom', TextType::class,['attr'=>['placeholder'=>'Nom conducteur'] ] )
						->add('prenom', TextType::class,  ['attr'=>['placeholder'=>'Prenom'] ])
						->add('adresse',  TextType::class,['attr'=>['placeholder'=>'Adresse'] ])
						->add('telephone', TextType::class,['attr'=>['placeholder'=>'Numero telephone'] ])
						
						->add('save', SubmitType::class, array('label' => 'Enregistrer conducteur'))
        ;
    }
public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Conducteurs::class,
        ));
    }
 
}