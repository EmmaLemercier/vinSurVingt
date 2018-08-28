<?php

namespace App\Form\Type;

use App\Entity\Bouteille;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BouteilleEditType extends BouteilleType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         for($i=50; $i>=0; $i--)
            {
                $capaciteGarde[$i] = $i;
            }
        for($i=18; $i>=8; $i--)
            {
                $teneurAlcool[$i] = $i;
            }
        $builder
            ->add('capaciteGardeBouteille', ChoiceType::class, array(
                'label' => 'Capacité de garde',                
                'label_attr' => array('class' => 'col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => $capaciteGarde))
            ->add('region', ChoiceType::class, array(
                'label' => 'Région',                
                'label_attr' => array('class' => 'col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => array(
                    'Bas-Rhin' => 'Bas-Rhin',
                    'Haut-Rhin' => 'Haut-Rhin',
                    'Médoc' => 'Médoc',
                    'Graves' => 'Graves'
                )))    
            ->add('provenance', ChoiceType::class, array(
                'label' => 'Provenance',                
                'label_attr' => array('class' => 'col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => array(
                    'France' => 'France',
                    'Espagne' => 'Espagne',
                    'Chili' => 'Chili',
                    'Australie' => 'Australie'
                )))    
            ->add('signeOfficielQualite', ChoiceType::class, array(
                'label' => 'Signe officiel de qualité',                
                'label_attr' => array('class' => 'col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => array(
                    'Agriculture Biologique' => 'Agriculture Biologique',
                    'AOP' => 'AOP',
                    'AOC' => 'AOC',
                    'IGP' => 'IGP',
                    'Demeter' => 'Demeter'
                )))    
            ->add('teneurSucre', ChoiceType::class, array(
                'label' => 'Teneur en sucre',                
                'label_attr' => array('class' => 'col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => array(
                    'Sec' => 'Sec',
                    'Demi-sec' => 'Demi-sec',
                    'Moelleux' => 'Moelleux',
                    'Liquoreux' => 'Liquoreux',
                )))   
            ->add('tranquillite', ChoiceType::class, array(
                'label' => 'Tranquillité',                
                'label_attr' => array('class' => 'col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' =>array(
                'Tranquille' => true,
                'Effervescent' => false
                )))
            ->add('teneurAlcool', ChoiceType::class, array(
                'label' => 'Teneur en alcool',                
                'label_attr' => array('class' => 'col-lg-5'),
                'placeholder' => '', 
                'required' => FALSE,
                'choices' => $teneurAlcool))
            ->add('submitUpdate', SubmitType::class, array('label' => 'Modifier'))
        ;
    }
    
    public function getParent()
    {
        return BouteilleType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bouteille::class,
        ]);
    }
}
