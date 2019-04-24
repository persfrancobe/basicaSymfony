<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tag",name="app_tag_")
 */
class TagController extends AbstractController
{

    /**
     * @Route("/{id}-{slug}", name="show", methods={"GET"},requirements={"id":"[1-9][0-9]*", "slug": "[a-z][a-z0-9\-]*"})
     * @param \App\Entity\Tag $tag
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Tag $tag): Response
    {
        return $this->render('tag/show.html.twig', [
            'tag' => $tag,
        ]);
    }

}
