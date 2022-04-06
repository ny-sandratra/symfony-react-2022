<?php

namespace App\Form;

use App\Entity\Declaration; 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DeclarationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDePerte',DateType::class,[
                'label'=>'Date de Perte ',
                'widget'=>'single_text',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('lieuDePerte',TextType::class,[
                'label'=>'Lieu de perte: ',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('description',TextareaType::class,[
                'label' => ' Description',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('dateDePublication',DateType::class,[
                'label'=>'Date de publication',
                'widget'=> 'single_text',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Declaration::class,
        ]);
    }
}
