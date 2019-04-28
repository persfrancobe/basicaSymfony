<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Form\BlogType;
use App\Repository\BlogRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blog",name="app_blog_")
 */
class BlogController extends AbstractController
{


    /**
     * @param \App\Repository\BlogRepository            $blogRepository
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Knp\Component\Pager\PaginatorInterface   $paginator
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(BlogRepository $blogRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $query=$blogRepository->findAll();
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            4 /*limit per page*/
        );

        return $this->render('blog/index.html.twig', [
            'blogs' =>$pagination
        ]);
    }


    /**
     * @Route("/{id}-{slug}", name="show", methods={"GET"},requirements={"id":"[1-9][0-9]*", "slug": "[a-z][a-z0-9\-]*"})
     * @param \App\Entity\Blog $blog
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Blog $blog): Response
    {
        return $this->render('blog/show.html.twig', [
            'blog' => $blog,
        ]);
    }

    /**
     * @param $entity
     * @param $route
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function similarBlogs(Blog $entity,string $route): Response
    {
        $sim=$this->getDoctrine()->getRepository(Blog::class)->findByCategories($entity->getCategories());
        return $this->render('partials/_similars.html.twig',['entities'=>$sim,'route'=>$route]);
    }
}
