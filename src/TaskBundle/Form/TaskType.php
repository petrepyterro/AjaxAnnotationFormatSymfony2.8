<?php

namespace TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
  /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('task', 'text', array(
        'label' => 'Task',
        'required' => true, //client side only
        'error_bubbling' => true,  
        'attr' => array(
            'size' => '23',
            'placeholder' => 'requires action...'
        )
      ))
      ->add('complete', 'checkbox', array(
        'label' => 'complete',
        'required' => false
      ));
  }

  /**
   * @param OptionsResolver $resolver
   */
  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'TaskBundle\Entity\Task'
    ));
  }
}
