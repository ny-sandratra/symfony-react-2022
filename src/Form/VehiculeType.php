<?php

namespace App\Form;

use App\Entity\Vehicule;
use PHPUnit\TextUI\XmlConfiguration\Logging\TestDox\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('modele',TextType::class,[
                'label'=>'Modèle',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('marque',TextType::class,[
                'label'=>'Marque',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('couleurInterne',TextType::class,[
                'label'=>'Couleur Interne',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('couleurExterne',TextType::class,[
                'label'=>'Couleur Externe',
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
            ->add('numeroSerie',TextType::class,[
                'label'=>'Numéro de Série',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('numeroMoteur',TextType::class,[
                'label'=>'Numéro Moteur',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
            ->add('carburant',TextType::class,[
                'label'=>'Carburant',
                'attr'=>[
                    'class'=>'form-control mb-1'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
