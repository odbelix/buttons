<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QuestionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,array( 'label'  => 'Pregunta' ))
            ->add('detail',TextareaType::class,array( 'label'  => 'Descripción o Detalle' ))
            ->add('suggestion',TextareaType::class,array( 'label'  => 'Sugerencia' ))
            ->add('showanswer',CheckboxType::class, array(
                'label'    => '¿Desea mostrar respuesta correcta?',
                'required' => false,
            ))
            ->add('showresults',CheckboxType::class, array(
                'label'    => '¿Desea mostrar los resultados de la pregunta?',
                'required' => false,
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CoreBundle\Entity\Question'
        ));
    }
}
