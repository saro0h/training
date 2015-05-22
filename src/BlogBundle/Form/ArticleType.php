<?php

namespace BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'label' => 'The title of your article',
                'attr' => array(
                    'placeholder' => 'Enter the title of your article',
                )
            ))
            ->add('subtitle', 'text', array(
                'label' => 'The subtitle of your article (optional)',
                'attr' => array(
                    'placeholder' => 'Enter the subtitle of your article',
                )
            ))
            ->add('content', 'textarea', array(
                'label' => 'The content of your article',
                'attr' => array(
                    'placeholder' => 'Enter the content of your article',
                )
            ))
            ->add('create', 'submit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlogBundle\Entity\Article',
        ));
    }

    public function getName()
    {
        return 'article';
    }
}