<?php

namespace App\Form\Type;

use App\Entity\Bouteille;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BouteilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        for($i=2018; $i>=1900; $i--)
            {
                $annees[$i] = $i;
                
            }
        $builder
            ->add('appellationBouteille', TextType::class, array(
                'label' => 'Appellation',
                'label_attr' => array('col-lg-5'),
                'required' => FALSE
                ))
            ->add('teinte', ChoiceType::class, array(
                'label' => 'Teinte',                
                'label_attr' => array('col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => array(
                    'Rouge' => 'Rouge',
                    'Rosé' => 'Rosé',
                    'Blanc' => 'Blanc',
                    'Gris' => 'Gris'
                )))                
            ->add('millesime', ChoiceType::class, array(
                'label' => 'Millesime',                
                'label_attr' => array('col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => $annees))
                
            ->add('submit', SubmitType::class, array('label' => 'Rechercher'))   
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bouteille::class,
        ]);
    }
}
