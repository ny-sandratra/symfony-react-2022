<?php

namespace App\Form;

use App\Entity\Signaller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SignallerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>'Noms ',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('prenoms',TextType::class,[
                'label'=>'Prénoms',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('numero',TextType::class,[
                'label'=>'Numéro Téléphone',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('email',TextType::class,[
                'label'=>'Adresse email',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Signaller::class,
        ]);
    }
}
