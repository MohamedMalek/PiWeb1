<?php
/**
 * Created by PhpStorm.
 * User: medma
 * Date: 29/03/2018
 * Time: 15:07
 */



namespace CollocationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class AnnonceCollocationEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function setEquipements($equipementString)
    {
        $equipements = array();
        $data = array();

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers);
        $jsonContent = $serializer->normalize($equipementString['data'],null,array());

       // $data = $serializer->toArray($equipementString['data']);

/*var_dump($jsonContent['equipements']);
  //  var_dump($equipementString['data']['equipements']);
     //   var_dump($equipements);

        $equipements = explode(',', $jsonContent['equipements']);
var_dump($equipements);*/
        return $equipements;
    }
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
                    'Chauffage'=>'Chauffage  <br>',
                    'Climatisation'=>'Climatisation  <br>',
                    'Petit déjeuner café, thé'=>'Petit déjeuner café, thé  <br>',
                    'Bureau/Espace de travail'=>'Bureau/Espace de travail  <br>',
                    'Cheminée'=>'Cheminée  <br>',
                    'Fer à repasser'=>'Fer à repasser  <br>',
                    'Sèche-cheveux'=>'Sèche-cheveux  <br>',
                    'Animaux domestiques sur place'=>'Animaux domestiques sur place  <br>',
                    'Entrée privée'=>'Entrée privée  <br>']
                ,
                'mapped' => false,
                'expanded' => true,
                'multiple' => true,




            ])
            ->add('image', 'Symfony\Component\Form\Extension\Core\Type\FileType', array('label' => 'Image','multiple' => false ))
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
            'data_class' => 'AppBundle\Entity\AnnonceCollocation' ,

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
