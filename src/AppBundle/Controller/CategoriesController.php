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

class CategoriesController extends Controller
{
    /**
     * @Route("/{block}/categories", name="categories")
     */
    public function listAction(Blocks $block, Request $request)
    {
      $blocksManager = $this->get('blocks.manager');

      $categoriesOriginal = $blocksManager->collectionsAdd($block->getCategories());

      $blockCategoriesForm = $this->createForm('blocks_categories', $block)->handleRequest($request);

        if($blockCategoriesForm->isValid()){

            $blocksManager->collectionsSave($block->getCategories(), $categoriesOriginal);

            $blocksManager->save($block);

            return $this->redirect($this->generateUrl('categories', array("block" => $block->getId())));
        }

      return $this->render('categories/list.html.twig', array(
        'blocks_categories_form' => $blockCategoriesForm->createView(),
        'block' => $block
      ));
    }
}
