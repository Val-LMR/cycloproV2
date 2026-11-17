<?php

namespace App\Form;

use App\Entity\Reparation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AjoutReparationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Type',TextType::class,['attr'=> ['class' => 'form-control'],'label_attr' => ['class' => 'form-label mt-4']])
            ->add('Description',TextareaType::class,['attr'=> ['class' => 'form-control', 'rows' => 5],'label_attr' => ['class' => 'form-label mt-4']])
            ->add('Envoyer',SubmitType::class,['attr'=> ['class' => 'btn btn-primary'], 'row_attr'=> ['class' => 'text-center']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reparation::class,
        ]);
    }
}
