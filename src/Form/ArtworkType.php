<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Artwork;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;


class ArtworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'constraints' => [
                    new NotBlank(),
                    new Length(min: 2, max: 255),
                ],
            ])
            ->add('creationDate', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [new NotBlank()],
            ])
            ->add('description', TextareaType::class, [
                'constraints' => [new NotBlank()],
            ])
            ->add('imagePath', TextType::class, [
                'constraints' => [new NotBlank()],
            ])
            ->add('artist', EntityType::class, [
                'class' => Artist::class,
                'choice_label' => fn(Artist $artist) => $artist->getFirstName() . ' ' . $artist->getLastname(),
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Save Artwork',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artwork::class,
        ]);
    }
}
