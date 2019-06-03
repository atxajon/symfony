<?php
namespace App\Controller;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ArticleAdminController extends AbstractController
{
  /**
   * @Route("/admin/article/new")
   */
  public function new(EntityManagerInterface $em)
  {
    $article = new Article();
    $article->setTitle('Article title')
      ->setSlug('article-title-'.rand(100, 999))
      ->setContent(<<<EOF
Spicy **jalapeno bacon** ipsum dolor amet veniam shank in dolore. Ham
EOF
      );
      $article->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 100))));
      $em->persist($article);
      $em->flush();
    return new Response(sprintf(
      'Hiya! New Article id: #%d slug: %s',
      $article->getId(),
      $article->getSlug()
    ));  }
}