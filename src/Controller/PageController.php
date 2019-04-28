<?php

namespace App\Controller;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 * @Route("/page",name="app_page_")
 */
class PageController extends AbstractController
{
    /**
     * @Route("/{id}-{slug}", name="show", methods={"GET"},requirements={"id":"[1-9][0-9]*", "slug": "[a-z][a-z0-9\-]*"}, defaults={"id"=1,"slug"="home"})
     * @param \App\Entity\Page $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Page $page): Response
    {
        return $this->render('page/show.html.twig', ['page' => $page]);
    }


    /**
     * @param $req
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function nav($req):Response
    {
        $pages=$this->getDoctrine()->getRepository(Page::class)->findAll();
        return $this->render('partials/_nav.html.twig',['pages'=>$pages,'req'=>$req]);
    }
}