<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UsersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsersRepository extends EntityRepository
{
    public function findFriends($user)
    {
        try {
            return $this->getEntityManager()->createQuery(
                'SELECT users, guests, hosts
                 FROM AppBundle:User users
                 LEFT JOIN users.guests guests
                 LEFT JOIN users.hosts hosts
                 WHERE users = :user
                '
            )
            ->setParameter('user', $user)
            ->getSingleResult();

        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }

    public function findForBlockUsers($users)
    {
        return $this->getEntityManager()
            ->getRepository('AppBundle:User')
            ->createQueryBuilder('users')
            ->where('users.id IN (:users)')
            ->setParameter('users', array(2,3,4));

    }
}
