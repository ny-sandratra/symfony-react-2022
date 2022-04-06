<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'required'=>true,
                'label'=>'Noms :',
                'attr'=>[
                    "class"=>'form-control mb-1',
                    "id"=>'name'
                    
                ]
            ])
            ->add('firstName',TextType::class,[
                'required'=>true,
                'label'=>'Prénoms :',
                'attr'=>[
                    "class"=>'form-control mb-1',
                    "id"=>'firstName',
                    
                ]
            ])
            ->add('dateDeNaissance',DateType::class,[
                'widget' => 'single_text',
                'required'=>true,
                'label'=>'Date de Naissance :',
                'attr'=>[
                    "class"=>'form-control mb-1',
                    "id"=>'dateDeNaissance',
                    
                ]
            ])
            ->add('lieuDeNaissance',TextType::class,[
                'required'=>true,
                'label'=>'Lieu de Naissance :',
                'attr'=>[
                    "class"=>'form-control mb-1',
                    "id"=>'lieuDeNaissance',
                    
                ]
            ])
            ->add('cin',IntegerType ::class,[
                'required'=>true,
                'label'=>'Numéro CIN :',
                'attr'=>[
                    "class"=>'form-control mb-1',
                    "id"=>'cin',
                    
                ]
            ])
            ->add('mail',EmailType::class,[
                'required'=>true,
                'label'=>'Email :',
                'attr'=>[
                    "class"=>'form-control mb-1',
                    "id"=>'email',
                    
                ]
            ])
            ->add('numero',IntegerType::class,[
                'required'=>true,
                'label'=>'Numéro :',
                'attr'=>[
                    "class"=>'form-control mb-1',
                    "id"=>'numero',
                    
                ]
            ])
            ->add('address',TextType::class,[
                'required'=>true,
                'label'=>'Adresse :',
                'attr'=>[
                    "class"=>'form-control mb-1',
                    "id"=>'adresse',
                    
                ]
            ])
            
        
        ;
        
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
