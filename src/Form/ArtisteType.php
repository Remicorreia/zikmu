<?php

namespace App\Form;

use App\Entity\Label;
use App\Entity\Artiste;
use App\Entity\Departement;
use App\Entity\Statistique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ArtisteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('photo')
            
            ->add('nom')

            ->add('style')

            ->add('gestuel')


            ->add('genre')

            ->add('note')

            ->add('label', EntityType::class,[
                "class"=>Label::class,
                "choice_label"=>"structure"
                ])

            ->add('departement',EntityType::class,[
                "class"=>Departement::class,
                "choice_label"=>"numero"
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artiste::class,
        ]);
    }
}
