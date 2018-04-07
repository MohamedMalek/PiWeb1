<?php
/**
 * Created by PhpStorm.
 * User: medma
 * Date: 03/04/2018
 * Time: 13:13
 */

namespace CollocationBundle\Repository;
use Doctrine\ORM\EntityRepository;

class AnnonceCollocationRepository extends EntityRepository
{
    public function FiltredByPrix($prix)
    {
        $query = $this->getEntityManager()
            ->createQuery("
            select m from AppBundle:AnnonceCollocation m 
            WHERE m.tarif < $prix
            ");

        return $query->getResult();
    }

}