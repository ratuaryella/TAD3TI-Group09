<?php

namespace App\Form;

use App\Entity\Responden;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RespondenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nama')
            ->add('umur')
            ->add('jk')
            ->add('pendidikan')
            ->add('pekerjaan')
            ->add('layanan')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Responden::class,
        ]);
    }
}
