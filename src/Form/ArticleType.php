<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label'=>"Titre",
                'constraints' => [
                    new NotBlank(["message"=>"Veuillez mettre un titre"])
                ],
                'required'=>false
            ])
            ->add('content',TextareaType::class,[
                "label"=>"Description",
                'attr' => [
                    'placeholder' => " ",
                    'class'=>'ckeditor',
                    'rows'=>4
                ],
                'constraints' => [
                    new NotBlank(["message"=>"Veuillez mettre quelque mots"])
                ],
                'required'=>false
            ])
            ->add('photo',FileType::class,[
                'label'=>"Image",
                'attr' => [
                    'placeholder' => " ",
                    "class" => "image"
                ],
                "data_class" => null,
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
