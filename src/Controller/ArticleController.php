<?php
/**
 * Created by PhpStorm.
 * User: jonatxa
 * Date: 01/06/2019
 * Time: 12:29
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController {

  /**
   * @Route("/")
   * @return Response
   */
  public function homepage() {
    return new Response('Some content to show on the front page');
  }

  /**
   * @Route("/blog")
   * @return Response
   */
  public function blogLanding() {
    return new Response('Content for blog page');
  }

  /**
   * @Route("/blog/{id}")
   */
  public function blogPages($id) {
    return new Response('Blog page for id: ' . $id);
  }
}