<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductType extends AbstractType
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
            ->add('price',TextType::class,[
                'label'=>"Prix",
                'constraints' => [
                    new NotBlank(["message"=>"Veuillez mettre un prix"])
                ],
                'required'=>false
            ])
            ->add('descritpion',TextareaType::class,[
                "label"=>"Description",
                'attr' => [
                    'placeholder' => " ",
                    'class'=>'ckeditor',
                    'rows'=>4
                ],
                'required'=>false
            ])
            ->add('photo',FileType::class,[
                'label'=>"Image",
                'attr' => [
                    'placeholder' => " ",
                    "class" => "image"
                ],
                'constraints' => [
                    new NotBlank(["message"=>"Veuillez mettre une image"])
                ],
                "data_class" => null,
                'required'=>false
            ])
            ->add('category',EntityType::class,[
                'class'=>Category::class,
                    'query_builder'=>function(CategoryRepository $er){
                        return $er->createQueryBuilder('c')
                            ->orderBy('c.name','ASC');
                    },
                    'label'=>'Catégory',
                    'placeholder'=>'Sélectionnez une catégorie',
                    'choice_label'=>'name',
                    'constraints' => [
                        new NotBlank(["message"=>"Veuillez sélectionner une catégorie"])
                    ],
                    'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
