<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Registros;
use AppBundle\Form\RegistrosType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

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
        /*$em = $this->getDoctrine()->getManager();

        $registros = $em->getRepository('AppBundle:Registros')->findAll();

        $categorias = $em->getRepository('AppBundle:Categorias');

        $registro = new Registros();
        $registroForm = $this->createForm(new RegistrosType(), $registro);
        $registroForm->handleRequest($request);

        if($registroForm->isValid()){

          $em->persist($registro);
          $em->flush();

          $this->get('session')->getFlashBag()->add('mensaje', 'Registro creado');

          return $this->redirect($this->generateUrl('registros'));
        }

        return $this->render('registros/registros.html.twig', array(
          'registro_form' => $registroForm->createView(),
          'registros'     => $registros
        ));
        */
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
     * @Route("/{id}", name="blocks_edit")
     */
    public function editAction($id, Request $request)
    {
      exit('Block edit');
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
