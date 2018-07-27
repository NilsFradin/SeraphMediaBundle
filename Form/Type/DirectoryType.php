<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 27/07/2018
 * Time: 15:26
 */

namespace Seraph\Bundle\MediaBundle\Form\Type;


use Seraph\Bundle\MediaBundle\Entity\Directory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DirectoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'Name', 'attr' => array('class' => 'form-control')))
            ->add('parent', null, array('choice_label' => 'name','label' => 'Parent', 'attr' => array('class' => 'form-control')))
            ->add('position', null, array('label' => 'Position', 'attr' => array('class' => 'form-control')))
            ->add('depth', null, array('label' => 'Depth', 'attr' => array('class' => 'form-control')))
            ->add('name', null, array('label' => 'Name', 'attr' => array('class' => 'form-control')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Directory::class);
    }

}