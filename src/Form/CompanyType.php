<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text1',TextareaType::class,[
                "label"=>"Informations générales",
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
            ->add('map',TextareaType::class,[
                "label"=>"Google Map",
                'attr' => [
                    'placeholder' => " ",
                    'class'=>'',
                    'rows'=>3
                ],
                'required'=>false
            ])
            ->add('about',TextareaType::class,[
                "label"=>"A Propos",
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
