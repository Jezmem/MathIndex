<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('last_name', TextType::class, [
                'label' => "Nom :",
                'required' => false,
            ])

            ->add('first_name',TextType::class, [
                'label' => "Prénom :",
                'required' => false,
            ])

            ->add('email', TextType::class, [
                'label' => "Email :",
                'required' => false,
            ])

            ->add('password', PasswordType::class, [
                'label' => "Mot de passe :",
                'required' => false,
                'empty_data' => '',
            ])
        ;

        // Add roles field only if the user doesn't have ROLE_ADMIN
        if (!in_array('ROLE_ADMIN', $options['user_roles'])) {
            $builder->add('roles', ChoiceType::class, [
                'label' => "Rôle :",
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'  => [
                    'Étudiant' => 'ROLE_STUDENT',
                    'Enseignant' => 'ROLE_TEACHER',
                ],
            ]);

            $builder->get('roles')
                ->addModelTransformer(new CallbackTransformer(
                    function ($rolesArray) {
                        // transform the array to a string
                        return count($rolesArray) ? $rolesArray[0] : null;
                    },
                    function ($rolesString) {
                        // transform the string back to an array
                        return [$rolesString];
                    }
                ));
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'user_roles' => [], 
        ]);
    }


}
    