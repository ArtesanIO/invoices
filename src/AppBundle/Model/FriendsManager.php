<?php

namespace AppBundle\Model;

use \Doctrine\Common\Collections\ArrayCollection;

class FriendsManager extends ModelManager
{

  public function allFriends($user)
  {

    $guests = [];
    $hosts = [];

    $state = 2;

    foreach($user->getGuests() as $guest){
      if($guest->getState() == $state){
        $guests[$guest->getId()]['id'] = $guest->getId();
        $guests[$guest->getId()]['user'] = $guest->getGuests();
      }
    }

    foreach($user->getHosts() as $host){
      if($host->getState() == $state){
        $hosts[$host->getId()]['id'] = $host->getId();
        $hosts[$host->getId()]['user'] = $host->getHosts();
      }
    }

    return array_merge($guests, $hosts);
  }

  public function blockUsers($user)
  {
    $allFriends = $this->allFriends($user);

    $users = new ArrayCollection();

    foreach($allFriends as $user){
      $users->add($user);
    }

    return $users;

  }

}
