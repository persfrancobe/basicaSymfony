<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Category;
use App\Entity\News;
use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/{id}-{slug}", name="app_page_show", methods={"GET"},requirements={"id":"[1-9][0-9]*", "slug": "[a-z][a-z0-9\-]*"},defaults={"id"=1,"slug"="home"})
     */
    public function show(Page $page): Response
    {
        return $this->render('page/show.html.twig',['page'=>$page]);
    }

    /**
     * @param $app
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function nav($app):Response
    {
        $pages=$this->getDoctrine()->getRepository(Page::class)->findAll();
        return $this->render('partials/_nav.html.twig',['pages'=>$pages,'app'=>$app]);
    }
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function slider():Response
    {
        $categories=$this->getDoctrine()->getRepository(Category::class)->findAll();
        return $this->render('partials/_slider.html.twig',['categories'=>$categories]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function lastBlogNews():Response
    {
        $news=$this->getDoctrine()->getRepository(News::class)->findBy([],['date'=>'DESC'],3);
        $blogs=$this->getDoctrine()->getRepository(Blog::class)->findBy([],['date'=>'DESC'],3);
        return $this->render('partials/_last-blogs-news.html.twig',['news'=>$news,'blogs'=>$blogs]);
    }

}
