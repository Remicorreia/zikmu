<?php

namespace App\Form;

use App\Entity\Artiste;
use App\Entity\Carte;
use App\Entity\SousStatistique;
use App\Entity\Statistique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('note')
            ->add('coefficient')
            ->add('statistique',EntityType::class,[
                'class'=>Statistique::class,
                'choice_label'=>"signification"
                ])
            ->add('sousStatistique',EntityType::class,[
                'class'=>SousStatistique::class,
                'choice_label'=>"designation"
                ])
            ->add('artiste',EntityType::class,[
                'class'=>Artiste::class,
                'choice_label'=>"nom"
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carte::class,
        ]);
    }
}
