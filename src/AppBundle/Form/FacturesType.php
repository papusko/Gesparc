<?php

namespace AppBundle\Form;

use AppBundle\Entity\Factures;
use AppBundle\Entity\Dentistes;
use AppBundle\Form\DentistesType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation')
            ->add('quantite')
            ->add('prix')
            ->add('designation_2')
            ->add('quantite_2')
            ->add('prix_2')
            ->add('designation_3')
            ->add('quantite_3')
            ->add('prix_3')
            ->add('designation_4')
            ->add('quantite_4')
            ->add('prix_4')
            ->add('dentiste', EntityType::class, array(
                        'class'=>'AppBundle\Entity\Dentistes',
                        'choice_label'=>'nomComplet',
                        'expanded'=>false,
                        'multiple'=>false))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Factures::class,
        ]);
    }
}
