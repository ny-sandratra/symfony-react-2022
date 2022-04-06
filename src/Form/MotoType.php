<?php

namespace App\Form;

use App\Entity\Moto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('modele',TextType::class,[
                'attr'=>[
                    'class'=>'form-control mb-1'
                ],
                'label'=>'Modèle :'
            ])
            ->add('marque',TextType::class,[
                'label'=> 'Marque :',
                'attr'=>[
                    'class'=> 'form-control mb-1'
                ]
            ])
            ->add('couleur',TextType::class,[
                'label'=>'Couleur :',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('numeroSerie',TextType::class,[
                'label'=>'Numéro de Série',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('numeroMatricule',TextType::class,[
                'label'=>'Numéro Matricule',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Moto::class,
        ]);
    }
}
