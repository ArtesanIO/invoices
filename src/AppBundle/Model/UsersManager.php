<?php

namespace AppBundle\Model;

class UsersManager extends ModelManager
{
    public function getFriends($user)
    {
        $friends = $this->getRepository()->findFriends($user);

        $guests = [];
        $hosts = [];

        $state = 2;

        foreach($friends->getGuests() as $guest){
          if($guest->getState() == $state){
            $guests[$guest->getId()]['id'] = $guest->getId();
            $guests[$guest->getId()]['user'] = $guest->getGuests();
          }
        }

        foreach($friends->getHosts() as $host){
          if($host->getState() == $state){
            $hosts[$host->getId()]['id'] = $host->getId();
            $hosts[$host->getId()]['user'] = $host->getHosts();
          }
        }
        
        return array_merge($guests, $hosts);
    }

    private function getIdsFriends($user)
    {
        $friends = $this->getFriends($user);

        $ids = [];

        foreach ($friends as $f => $friend) {
            $ids[$friend['user']->getId()] = $friend['user']->getId();
        }
        
        return $ids;
    }

    public function getBlockUsers($user)
    {
        $ids = $this->getIdsFriends($user);

        return $this->getRepository()->findForBlockUsers($ids);
    }
}
