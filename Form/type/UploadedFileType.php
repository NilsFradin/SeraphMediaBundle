<?php
/**
 * Created by PhpStorm.
 * User: sERAPH1
 * Date: 23/07/2018
 * Time: 15:23
 */

namespace Seraph\Bundle\MediaBundle\Form;


use Seraph\Bundle\MediaBundle\Entity\Group;
use Seraph\Bundle\MediaBundle\Entity\UploadedFile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class UploadedFileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array('label' => 'French Title', 'attr' => array('class' => 'form-control')))
            ->add('file', VichFileType::class, ['required' => false, 'allow_delete' => true, 'attr' => array('class' => 'form-control')])
            ->add('group', null, array('choice_label' => 'name', 'label' => 'Group', 'attr' => array('class' => 'form-control')))
            ->add('user', null, array('choice_label' => 'fullName', 'label' => 'User', 'attr' => array('class' => 'form-control')));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', UploadedFile::class);
    }

}