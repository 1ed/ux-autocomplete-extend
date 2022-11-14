<?php

namespace App\Form;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\ParentEntityAutocompleteType;

#[AsEntityAutocompleteField]
class PostAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => Post::class,
            'placeholder' => 'Choose a Post',
            //'choice_label' => 'name',

            'query_builder' => function (PostRepository $postRepository) {
                return $postRepository->createQueryBuilder('post');
            },
        'attr' => [
              'data-controller' => 'post',
            ],
            //'security' => 'ROLE_SOMETHING',
        ]);
    }

    public function getParent(): string
    {
        return ParentEntityAutocompleteType::class;
    }
}
