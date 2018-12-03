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
                'attr' => ['class' => 'form-control'],
                'constraints' => array(
                    new NotBlank(),
                    new Length(array(
                        'min' => 3,
                        'max' => 20,
                        'minMessage' => "Nazwa musi składać się z przynajmniej {{ limit }} znaków.",
                        'maxMessage' => "Maksymalna liczba znaków w nazwie to {{ limit }}."
                    )),
                )
            ])
            ->add('save', SubmitType::class, array(
            'label' => 'Dołącz do chatu',
            'attr' => ['class' => 'btn btn-lg btn-primary btn-block'],
        ))
            ->getForm();
    }

}