<?php

namespace App\Form;

use App\Entity\Instansi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstansiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nama')
            ->add('alamat')
            ->add('nomor_kontak')
            ->add('nama_pimpinan')
            ->add('tingkat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Instansi::class,
        ]);
    }
}
