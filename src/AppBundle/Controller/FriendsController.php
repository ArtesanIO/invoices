<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blocks;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/friends")
 */


class FriendsController extends Controller
{
    /**
     * @Route("", name="friends")
     */
    public function listAction(Request $request)
    {

      $friendsManager = $this->get('friends.manager');

      $friends = $friendsManager->allFriends($this->getUser());

      return $this->render('friends/list.html.twig', array(
        'friends' => $friends,
      ));
    }

    /**
     * @Route("/search", name="friends_search")
     */
    public function searchAction(Request $request)
    {

      $usersManager = $this->get('users.manager');

      $user = $usersManager->getRepository()->findOneBy(['id' => $this->getUser()]);

      return $this->render('friends/search.html.twig', array(
        'users' => $usersManager->getRepository()->findAll(),
      ));
    }

    /**
     * @Route("/invitations", name="friends_invitations")
     */
    public function invitationsAction(Request $request)
    {

      $friendsManager = $this->get('friends.manager');

      $invitations = $friendsManager->getRepository()->findBy(array('guests' => $this->getUser()->getId(), 'state' => 1));

      return $this->render('friends/invitations.html.twig', array(
        //'users' => $usersManager->getRepository()->findAll(),
        'invitations' => $invitations
      ));
    }

    /**
     * @Route("/invitations/accepted", name="friends_invitations_accepted")
     * @Method({"POST"});
     */
    public function invitationsAcceptedAction(Request $request)
    {

      $friendsManager = $this->get('friends.manager');

      $params = $request->request;

      $friends = $friendsManager->getRepository()->findOneBy(array('id' => $params->get('invitation')));

      $friends->setState($params->get('invitation_action'));

      $friendsManager->save($friends);

      return $this->redirect($this->generateUrl('friends_invitations'));
    }

    /**
     * @Route("/invitations-send/{guest}", name="friends_invitations_send")
     */
    public function invitationsSendAction(User $guest, Request $request)
    {
      $friendsManager = $this->get('friends.manager');

      $friends = $friendsManager->create();

      $friends->setHosts($this->getUser());
      $friends->setGuests($guest);
      $friends->setState(1);
      $friendsManager->save($friends);

      return $this->redirect($this->generateUrl('friends_search'));
    }
}
