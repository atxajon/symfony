<?php

namespace App\Controller;


use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController {

  /**
   * @Route("/", name="app_homepage")
   * @return Response
   */
  public function homepage() {
    return $this->render('article/homepage.html.twig');
  }

  /**
   * @Route("/blog")
   * @return Response
   */
  public function blogLanding() {
    return new Response('Content for blog page');
  }

  /**
   * @Route("/blog/{article_slug}", name="article_show")
   */
  public function blogPages($article_slug) {
    $comments = [
      'I ate a normal rock once. It did NOT taste like bacon!',
      'Woohoo! I\'m going on an all-asteroid diet!',
      'I like bacon too! Buy some from my site! bakinsomebacon.com',
    ];
    return $this->render('article/show.html.twig', [
      'title' => 'Blog page',
      'article_slug' => $article_slug,
      'comments' => $comments,
    ]);
  }

  /**
   * @Route("/blog/{article_slug}/heart", name="article_toggle_heart", methods={"POST"})
   * @param $article_slug
   *
   * @return JsonResponse
   */
  public function toggleArticleHeart($article_slug, LoggerInterface $logger) {
    // @todo: we dont have a db yet, when we do we need to heart/unheart.
    $logger->info('Article is being hearted');
    return new JsonResponse(['hearts' => rand(5, 100)]);
  }
}