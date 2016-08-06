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

      $categoriesManager = $this->get('categories.manager');

      $conceptsOriginal = $categoriesManager->collectionsAdd($category->getConcepts());

      $blockCategoriesForm = $this->createForm('blocks_categories', $block);

      $categoriesConceptsForm = $this->createForm('categories_concepts', $category)->handleRequest($request);

      if($categoriesConceptsForm->isValid()){

          $categoriesManager->collectionsSave($category->getConcepts(), $conceptsOriginal);

          $categoriesManager->save($category);

          return $this->redirect($this->generateUrl('categories_concepts', ["block" => $block->getId(), "category" => $block->getId()]));

      }


      $categoriesConceptsForm = $this->createForm('categories_concepts', $category)->handleRequest($request);

      return $this->render('categories/concepts/lists.html.twig', array(
        'blocks_categories_form' => $blockCategoriesForm->createView(),
        'categories_concepts_form' => $categoriesConceptsForm->createView(),
        'block' => $block,
        'category' => $category
      ));
    }
}
