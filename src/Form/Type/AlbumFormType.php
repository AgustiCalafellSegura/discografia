<?php

namespace App\Form\Type;

use App\Entity\Album;
use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlbumFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add(
                'artist',
                EntityType::class,
                array(
                    'class' => Artist::class,
                    'query_builder' => function (ArtistRepository $ar) {
                        return $ar->findAllSortedByNameQB();
                    },
                )
            )
            ->add('genere')
            ->add('year')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Album::class,
        ));
    }
}