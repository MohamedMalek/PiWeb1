<?php
/**
 * Created by PhpStorm.
 * User: Emel
 * Date: 01/04/2018
 * Time: 11:54
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;

class JoueurRepository extends EntityRepository
{


    public function DQLAfficher($id)
    {
        $query=$this->getEntityManager()->createQuery("
        select j 
        from AppBundle:Joueur j
        where j.idEquipe= $id ");
        return $query->getResult();
    }
}