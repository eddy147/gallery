<?php

namespace Indydutch\ImageBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository, custom queries for Categories.
 */
class CategoryRepository extends EntityRepository
{
    /**
     * @param Category $category
     *
     * @return array
     */
    public function findImagesByCategory(Category $category)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                'SELECT i ' .
                'FROM   IndydutchImageBundle:Image i ' .
                'INNER  JOIN IndydutchImageBundle:Category c WITH c.id = i.category ' .
                'WHERE  c = :category ' .
                'ORDER BY i.name ASC'
            );
            $query->setParameter('category', $category);

        return $query->getResult();
    }
}