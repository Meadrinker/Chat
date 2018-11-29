<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('user', TextType::class, [
                'label' => 'Username: ',
                'label_attr' => ['class' => 'userLabelField'],
                'attr' => ['class' => 'userField'],
                'constraints' => array(
                    new NotBlank(),
                    new Length(array(
                        'min' => 3,
                        'max' => 20,
                        'minMessage' => "Nazwa musi skladac sie z przynajmniej {{ limit }} znakow",
                        'maxMessage' => "Maksymalna liczba znakow w nazwie to {{ limit }}"
                    )),
                )
            ])
            ->add('save', SubmitType::class, array(
            'label' => 'Enter the Chat',
            'attr' => ['class' => 'userSubmitButton'],
        ))
            ->getForm();

    }

}