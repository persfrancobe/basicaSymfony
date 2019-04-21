<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Category;
use App\Entity\Image;
use App\Entity\News;
use App\Entity\Page;
use App\Entity\Txt;
use App\Form\PageType;
use App\Repository\PageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage", methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('page/index.html.twig');
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
