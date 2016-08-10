<?php

namespace AppBundle\Controller\API;

use AppBundle\Entity\Blocks;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class APIController extends FOSRestController
{
   public function getUsersAction()
   {

     $usersManager = $this->get("blocks.manager");

     $users = $usersManager->getRepository()->findAll();

     /**
     * TODO
     * Serializer the data:
     * Eg: https://openclassrooms.com/forum/sujet/serialisation-d-une-liste-des-entites-en-json
     */

     $users = $this->get('serializer')->serialize($users, 'json', array('groups' => ['blocks']));

     $view = $this->view($users, 200);

     return $this->handleView($view);
   }
}
