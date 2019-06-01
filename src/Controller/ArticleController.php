<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController {

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
    $comments = [
      'I ate a normal rock once. It did NOT taste like bacon!',
      'Woohoo! I\'m going on an all-asteroid diet!',
      'I like bacon too! Buy some from my site! bakinsomebacon.com',
    ];
    return $this->render('article/show.html.twig', [
      'title' => 'Blog page',
      'page_id' => ucwords($id),
      'comments' => $comments,
    ]);
  }
}