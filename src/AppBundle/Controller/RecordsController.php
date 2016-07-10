<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Blocks;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/blocks")
 */


class RecordsController extends Controller
{
    /**
     * @Route("/{block}/records", name="records")
     */
    public function listAction(Blocks $block, Request $request)
    {
      $recordsManager = $this->get('records.manager');

      $records = $recordsManager->create();

      $recordsForm = $this->createForm('records', $records)->handleRequest($request);

      if($recordsForm->isValid()){
        $records->setBlocks($block);
        $recordsManager->save($records);
        return $this->redirect($this->generateUrl('records', array('block' => $block->getId())));
      }

      $records = $recordsManager->getRepository()->findOneBy(array('blocks'=> $block));

      return $this->render('records/list.html.twig', array(
        'block' => $block,
        'records_form' => $recordsForm->createView(),
        'records'     => $block->getRecords()
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
