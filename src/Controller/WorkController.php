<?php

namespace App\Controller;

use App\Entity\Work;
use App\Form\WorkType;
use App\Repository\WorkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/work",name="app_work_")
 */
class WorkController extends AbstractController
{

    /**
     * @Route("/", name="index", methods={"GET"})
     * @param \App\Repository\WorkRepository $workRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(WorkRepository $workRepository): Response
    {
        return $this->render('work/index.html.twig', [
            'works' => $workRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}-{slug}", name="show", methods={"GET"},requirements={"id":"[1-9][0-9]*", "slug": "[a-z][a-z0-9\-]*"})
     * @param \App\Entity\Work $work
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(Work $work): Response
    {
        return $this->render('work/show.html.twig', [
            'work' => $work,
        ]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function last():Response
    {
        $last_Works=$this->getDoctrine()->getRepository(Work::class)->findBy([],['date'=>'DESC'],6);
        return $this->render('work/_last-works.html.twig',['last_works'=>$last_Works]);
    }


    /**
     * @param \App\Entity\Work $entity
     * @param string           $route
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function similarWorks(Work $entity, string $route): Response
    {
        $sim=$this->getDoctrine()->getRepository(Work::class)->findByTags($entity->getTags());
        return $this->render('partials/_similars.html.twig',['entities'=>$sim,'route'=>$route]);
    }
}
