<?php

namespace App\Form;

use App\Entity\Origin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OriginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom :",
                'required' => false,
                'attr' => [
                'placeholder' => "Saissisez le nom de l'origine",
                ],
            ])
            // submit      
            ->add('submit', SubmitType::class, [
                  'label' => "Enregistrer",
            ])
        
        ;

        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Origin::class,
        ]);
    }
}
