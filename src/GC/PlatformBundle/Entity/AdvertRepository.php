<?php
namespace GC\PlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdvertRepository extends EntityRepository
{
    public function myFindAll()
    {
        // Méthode 1 : en passant par l'EntityManager
        $queryBuilder = $this->_em->createQueryBuilder()
            ->select('a')
            ->from($this->_entityName, 'a')
        ;
        // Dans un repository, $this->_entityName est le namespace de l'entité gérée
        // Ici, il vaut donc OC\PlatformBundle\Entity\Advert

        // Méthode 2 : en passant par le raccourci (je recommande)
        $queryBuilder = $this->createQueryBuilder('a');

        // On n'ajoute pas de critère ou tri particulier, la construction
        // de notre requête est finie

        // On récupère la Query à partir du QueryBuilder
        $query = $queryBuilder->getQuery();

        // On récupère les résultats à partir de la Query
        $results = $query->getResult();

        // On retourne ces résultats
        return $results;
    }
}