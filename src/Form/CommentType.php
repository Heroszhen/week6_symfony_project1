<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'label'=>"Nom",
                'constraints' => [
                    new NotBlank(["message"=>"Veuillez mettre un nom"])
                ],
                'required'=>false
            ])
            ->add('message',TextareaType::class,[
                "label"=>"Message",
                'attr' => [
                    'placeholder' => " ",
                    'class'=>'',
                    'rows'=>1
                ],
                'constraints' => [
                    new NotBlank(["message"=>"Veuillez mettre quelque mots"])
                ],
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
