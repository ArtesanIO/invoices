<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blocks;
use AppBundle\Entity\Categories;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/blocks")
 */

class CategoriesConceptsController extends Controller
{
    /**
     * @Route("/{block}/categories/{category}", name="categories_concepts")
     */
    public function listAction(Blocks $block, Categories $category, Request $request)
    {
      $blocksManager = $this->get('blocks.manager');

      $categoriesOriginal = $blocksManager->collectionsAdd($block->getCategories());

      $blockCategoriesForm = $this->createForm('blocks_categories', $block)->handleRequest($request);

        if($blockCategoriesForm->isValid()){

            $blocksManager->collectionsSave($block->getCategories(), $categoriesOriginal);

            $blocksManager->save($block);

            return $this->redirect($this->generateUrl('categories', array("block" => $block->getId())));
        }

      $categoriesManager = $this->get('categories.manager');

      $categoriesConceptsForm = $this->createForm('categories_concepts', $category)->handleRequest($request);

      return $this->render('categories/concepts/lists.html.twig', array(
        'blocks_categories_form' => $blockCategoriesForm->createView(),
        'categories_concepts_form' => $categoriesConceptsForm->createView(),
        'block' => $block,
        'category' => $category
      ));
    }
}
