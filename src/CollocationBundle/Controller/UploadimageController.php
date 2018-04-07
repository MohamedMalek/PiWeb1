<?php
/**
 * Created by PhpStorm.
 * User: medma
 * Date: 22/03/2018
 * Time: 15:19
 */

namespace CollocationBundle\Controller;
use AppBundle\Entity\AnnonceCollocation;
use AppBundle\Entity\Uploadimage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadimageController extends Controller
{
    /**
     * UploadimageController constructor.
     */
    public function __construct()
    {
    }
    public function getImagesAnnonces(AnnonceCollocation $annonceCollocation,array $UploadedImages)
    {


    $count=0;
        foreach ($UploadedImages as $image)
        {
            if ($image->getIdAnnonce()==$annonceCollocation->getIdAnnonce()&&($count==0))
            {
                $annonceCollocation->setImage($image->getMediaLink());
                $count=1;
            }
            if ($image->getIdAnnonce()==$annonceCollocation->getIdAnnonce()&&($count==1))
            {
                $annonceCollocation->setImage1($image->getMediaLink());
                $count=2;
            }
            if ($image->getIdAnnonce()==$annonceCollocation->getIdAnnonce()&&($count==2))
            {
                $annonceCollocation->setImage2($image->getMediaLink());
                $count=3;
            }
            if ($image->getIdAnnonce()==$annonceCollocation->getIdAnnonce()&&($count==3))
            {
                $annonceCollocation->setImage3($image->getMediaLink());
                $count=4;
            }

        }

    }
    public function getImagesAnnonce(AnnonceCollocation $annonceCollocation,array $UploadedImages)
    {


        $count=0;
        foreach ($UploadedImages as $image)
        {
            if ($image->getIdAnnonce()==$annonceCollocation->getIdAnnonce()&&($count==0))
            {
                $annonceCollocation->setImage($image->getMediaLink());
                $count=1;
            }
            if ($image->getIdAnnonce()==$annonceCollocation->getIdAnnonce()&&($count==1))
            {
                $annonceCollocation->setImage1($image->getMediaLink());
                $count=2;
            }
            if ($image->getIdAnnonce()==$annonceCollocation->getIdAnnonce()&&($count==2))
            {
                $annonceCollocation->setImage2($image->getMediaLink());
                $count=3;
            }
            if ($image->getIdAnnonce()==$annonceCollocation->getIdAnnonce()&&($count==3))
            {
                $annonceCollocation->setImage3($image->getMediaLink());
                $count=4;
            }

        }

    }
    public function AddImages(AnnonceCollocation $annonceCollocation, array $annonceCollocations,$em)
    {
        $an=new AnnonceCollocation();
        $lastindex=count($annonceCollocations)-1;
        $an=$annonceCollocations[$lastindex];
        $up=new Uploadimage();
        if (!empty($annonceCollocation->getImage()))
            $up=new Uploadimage();
        $up->setIdAnnonce($an->getIdAnnonce());
        $IU=new ImageUpload("UploadsImages");
        $UF=new UploadedFile($annonceCollocation->getImage(),$annonceCollocation->getImage());
        $name=$IU->upload($UF);
        $up->setMediaLink($name);
        $em->persist($up);
        $em->flush();
        if (!empty($annonceCollocation->getImage1()))
            $up=new Uploadimage();
        $up->setIdAnnonce($an->getIdAnnonce());
        $IU=new ImageUpload("UploadsImages");
        $UF=new UploadedFile($annonceCollocation->getImage1(),$annonceCollocation->getImage1());
        $name=$IU->upload($UF);
        $up->setMediaLink($name);
        $em->persist($up);
        $em->flush();
        if (!empty($annonceCollocation->getImage2()))
            $up=new Uploadimage();
        $up->setIdAnnonce($an->getIdAnnonce());
        $IU=new ImageUpload("UploadsImages");
        $UF=new UploadedFile($annonceCollocation->getImage2(),$annonceCollocation->getImage2());
        $name=$IU->upload($UF);
        $up->setMediaLink($name);
        $em->persist($up);
        $em->flush();
        if (!empty($annonceCollocation->getImage3()))
            $up=new Uploadimage();
        $up->setIdAnnonce($an->getIdAnnonce());
        $IU=new ImageUpload("UploadsImages");
        $UF=new UploadedFile($annonceCollocation->getImage3(),$annonceCollocation->getImage3());
        $name=$IU->upload($UF);
        $up->setMediaLink($name);
        $em->persist($up);
        $em->flush();
    }

}