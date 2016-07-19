<?php

namespace BZ\ModelBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TacheAudienceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TacheAudienceRepository extends EntityRepository
{
    public function getAgenda($datedebut, $datefin, $id)
    {
        $qb = $this->createQueryBuilder('t');
                    $qb->where('t.dateparticipee BETWEEN :debut AND :fin')
                    ->leftJoin('t.agentdestinataire','a')
                    ->addSelect('a')
                    ->andWhere('t.estresolue = :delete')
                    ->andWhere('t.estdelete = :delete')
                    ->andWhere('a.id = :agent')
                    ->setParameter('debut', $datedebut)
                    ->setParameter('fin', $datefin)
                    ->setParameter('agent', $id)
                    ->setParameter('delete', false)
                    ->orderBy('t.dateparticipee', 'ASC');
          return $qb->getQuery()
                ->getResult();
    }
    
}