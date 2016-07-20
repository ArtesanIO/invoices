<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blocks;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/blocks")
 */


class BlocksController extends Controller
{
    /**
     * @Route("", name="blocks")
     */
    public function listAction(Request $request)
    {

      $blocksManager = $this->get('blocks.manager');

      $blocks = $blocksManager->getRepository()->findAll();

      return $this->render('blocks/list.html.twig', array(
        'blocks' => $blocks
      ));
    }

    /**
     * @Route("/create", name="blocks_create")
     */
    public function createAction(Request $request)
    {
      $blocksManager = $this->get('blocks.manager');

      $blocks = $blocksManager->create();

      $blocksForm = $this->createForm('blocks', $blocks)->handleRequest($request);

      if($blocksForm->isValid()){
        $blocksManager->save($blocks);

        return $this->redirect($this->generateUrl('blocks'));
      }

      return $this->render('blocks/create.html.twig', array(
        'blocks_form' => $blocksForm->createView()
      ));
    }

    /**
     * @Route("/{block}/edit", name="blocks_edit")
     */
    public function editAction(Blocks $block, Request $request)
    {
      $blocksManager = $this->get('blocks.manager');

      $blocksForm = $this->createForm('blocks', $block)->handleRequest($request);

      if($blocksForm->isValid()){
        $blocksManager->save($block);

        return $this->redirect($this->generateUrl('blocks'));
      }

      return $this->render('blocks/edit.html.twig', array(
        'blocks_form' => $blocksForm->createView(),
          'block' => $block
      ));
    }

    /**
     * @Route("/editar/{id}", name="registro_editar", options={"expose": true})
     */

    public function registroEditarAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $registro = $em->getRepository("AppBundle:Registros")->find($id);

        $registroForm = $this->createForm(new RegistrosType(), $registro);

        $htmlForm = $this->renderView('registros/registro-form.html.twig', array(
          'registro_form' => $registroForm->createView()
        ));

        return new Response(json_encode($htmlForm));
    }
}
