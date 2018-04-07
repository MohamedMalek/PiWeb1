<?php
/**
 * Created by PhpStorm.
 * User: medma
 * Date: 22/03/2018
 * Time: 14:56
 */

namespace CollocationBundle\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ImageUpload
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDir(), $fileName);

        return $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }


}