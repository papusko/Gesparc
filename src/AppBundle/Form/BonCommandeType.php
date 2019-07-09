<?php

namespace AppBundle\Form;

use AppBundle\Entity\BonCommandes;
use AppBundle\Entity\Dentistes;
use AppBundle\Form\DentistesType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BonCommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation')
            ->add('quantite')
            ->add('designation_2')
            ->add('quantite_2')
            ->add('designation_3')
            ->add('quantite_3')
            ->add('designation_4')
            ->add('quantite_4')
            ->add('dentiste', EntityType::class, array(
                        'class'=>'AppBundle\Entity\Dentistes',
                        'choice_label'=>'nomComplet',
                        'expanded'=>false,
                        'multiple'=>false))
            ->add('essayage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BonCommandes::class,
        ]);
    }
}
