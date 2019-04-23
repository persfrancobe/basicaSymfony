<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Form\BlogType;
use App\Repository\BlogRepository;
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
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(BlogRepository $blogRepository): Response
    {
        return $this->render('blog/index.html.twig', [
            'blogs' => $blogRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}-{slug}", name="show", methods={"GET"})
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
