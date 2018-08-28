<?php

namespace App\Form\Type;

use App\Entity\Bouteille;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BouteilleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        for($i=2018; $i>=1900; $i--)
            {
                $annees[$i] = $i;
            }
         for($i=50; $i>=0; $i--)
            {
                $capaciteGarde[$i] = $i;
            }
        for($i=18; $i>=8; $i--)
            {
                $teneurAlcool[$i] = $i;
            }
        $builder
            ->add('appellationBouteille', TextType::class, array(
                'label' => 'Appellation',
                'label_attr' => array('class' => 'col-lg-5'),
                'required' => FALSE
                ))
            ->add('teinte', ChoiceType::class, array(
                'label' => 'Teinte',                
                'label_attr' => array('class' => 'col-lg-5'),
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
                'label_attr' => array('class' => 'col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => $annees))   
            ->add('submit', SubmitType::class, array('label' => 'Rechercher'))
        ;
        
        $builder->addEventListener(
                FormEvents::PRE_SET_DATA, 
                function(FormEvent $event) { 
                $bouteille = $event->getData();

        if (null == $bouteille) {
          return; 
        }
         if (!null == $bouteille->getId()) {
          $event->getForm()->remove('submit');
        } 
        }
        );
                
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bouteille::class,
        ]);
    }
}
