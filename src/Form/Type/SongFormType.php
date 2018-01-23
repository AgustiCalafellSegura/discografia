<?php

namespace App\Form\Type;

use App\Entity\Album;
use App\Entity\Song;
use App\Repository\AlbumRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SongFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add(
                'album',
                EntityType::class,
                array(
                    'class' => Album::class,
                    'query_builder' => function (AlbumRepository $ar) {
                        return $ar->findAllSortedByNameQB();
                    },
                )
            )
            ->add('duration')
            ->add('stars')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Song::class,
        ));
    }
}