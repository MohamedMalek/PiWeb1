<?php
/**
 * Created by PhpStorm.
 * User: medma
 * Date: 06/04/2018
 * Time: 18:03
 */

namespace CollocationBundle\Repository;
use AppBundle\Entity\Reclamation;
use Doctrine\ORM\EntityRepository;

class ReclamationRepository extends EntityRepository
{
    public function GetBlackList()
    {
        $query = $this->getEntityManager()
            ->createQuery("
            select m from AppBundle:Reclamation m LEFT JOIN AppBundle:AnnonceCollocation n
            WHERE  n.IsBlackListed = '1'
            ");



        return $query->getResult();
    }
    public function GetReclamedList()
    {
        $query = $this->getEntityManager()
            ->createQuery("
            select m from AppBundle:Reclamation m LEFT JOIN AppBundle:AnnonceCollocation n
            WHERE  n.IsBlackListed = '0'
            ");


    }


}