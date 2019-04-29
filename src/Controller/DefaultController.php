<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Entity\Category;
use App\Entity\News;
use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function home()
    {
        return $this->redirectToRoute('app_page_show',['id'=>1,'slug'=>'accueil','_locale'=>'fr']);
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

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sidebar():Response
    {
        $tags=$this->getDoctrine()->getRepository(Tag::class)->findAll();
        $categories=$this->getDoctrine()->getRepository(Category::class)->findAll();
        $blogs=$this->getDoctrine()->getRepository(Blog::class)->findBy([],['date'=>'DESC'],10);
        return $this->render('partials/_sidebar.html.twig',['tags'=>$tags,'posts'=>$blogs,'categories'=>$categories]);
    }

}
