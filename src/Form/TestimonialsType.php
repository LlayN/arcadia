<?php

namespace App\Form;

use App\Entity\Testimonials;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestimonialsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('POST')
            ->add('username', TextType::class, ['label' => 'Nom d\'utilisateur'])
            ->add('opinion', TextareaType::class, ['label' => 'Votre avis'])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer mon avis', 'attr' => ['class' => 'btn-submit back-primary p-3 px-5 rounded-0 text-white m-0 w-100 border-0']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Testimonials::class,
            'csrf_protection' => true,
            'csrf_field_name' => '_token'
            // a unique key to help generate the secret token
        ]);
    }
}
