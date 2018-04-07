<?php

namespace CollocationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AnnonceCollocationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idAnnonceur')
            ->add('titreAnnonce')
            ->add('description')
            ->add('tarif')
            ->add('datedebut')
            ->add('datefin')
            ->add('nombrechambres')
            ->add('nombreslits')
            ->add('equipements', ChoiceType::class, [
                'choices' => [
                    'Equipements de base(Serviettes, draps, savon, papier toilette et oreillers)'=>'Equipements de base(Serviettes, draps, savon, papier toilette et oreillers) <br>',
                    'Wi-Fi'=>'Wi-Fi  <br>',
                    'Shampoing'=>'Shampoing  <br>',
                    'Penderie/Commode'=>'Penderie/Commode <br>',
                    'Télévision'=>'Télévision  <br>',
                    'Chauffage'=>'chau  <br>',
                    'Climatisation'=>'clim  <br>',
                    'Petit déjeuner café, thé'=>'dej  <br>',
                    'Bureau/Espace de travail'=>'bur  <br>',
                    'Cheminée'=>'chem  <br>',
                    'Fer à repasser'=>'fer  <br>',
                    'Sèche-cheveux'=>'sech  <br>',
                    'Animaux domestiques sur place'=>'anim  <br>',
                    'Entrée privée'=>'entre  <br>']
                ,
                'mapped' => true,
                'expanded' => true,
                'multiple' => true,
            ])->add('image', 'Symfony\Component\Form\Extension\Core\Type\FileType', array('label' => 'Image','multiple' => false ))
            ->add('image1', 'Symfony\Component\Form\Extension\Core\Type\FileType', array('label' => 'Image','multiple' => false ))
            ->add('image2', 'Symfony\Component\Form\Extension\Core\Type\FileType', array('label' => 'Image','multiple' => false ))
            ->add('image3', 'Symfony\Component\Form\Extension\Core\Type\FileType', array('label' => 'Image','multiple' => false ))

        ;



    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\AnnonceCollocation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'CollocationBundle';
    }


}
