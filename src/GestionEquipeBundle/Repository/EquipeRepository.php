<?php
/**
 * Created by PhpStorm.
 * User: Emel
 * Date: 29/03/2018
 * Time: 18:31
 */

namespace GestionEquipeBundle\Repository;


use Doctrine\ORM\EntityRepository;

class EquipeRepository extends EntityRepository
{
    public function DQLUpdate($id,$pays,$etat,$phase,$groupe,$sel,$lien)
    {
        $query=$this->getEntityManager()->createQuery('
    UPDATE AppBundle:Equipe e
      SET  e.pays = :nvPays
      WHERE e.id = :idEquipe'
        );

        $query->setParameter('nvPays', $pays);
        $query->setParameter('idet', $id);
        $query->execute();


    }
}