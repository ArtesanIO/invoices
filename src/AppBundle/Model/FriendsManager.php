<?php

namespace AppBundle\Model;

class FriendsManager extends ModelManager
{

  public function allFriends($user)
  {

    $guests = [];
    $hosts = [];

    foreach($user->getGuests() as $guest){
      if($guest->getState() == 2){
        $guests[$guest->getId()]['id'] = $guest->getId();
        $guests[$guest->getId()]['user'] = $guest->getHosts();
      }
    }

    foreach($user->getHosts() as $host){
      if($host->getState() == 2){
        $hosts[$host->getId()]['id'] = $host->getId();
        $hosts[$host->getId()]['user'] = $host->getGuests();
      }
    }

    return array_merge($guests, $hosts);
  }

}
