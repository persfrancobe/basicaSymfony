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
 * @Route("/work")
 */
class WorkController extends AbstractController
{
    /**
     * @Route("/", name="work_index", methods={"GET"})
     */
    public function index(WorkRepository $workRepository): Response
    {
        return $this->render('work/index.html.twig', [
            'works' => $workRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="work_show", methods={"GET"})
     */
    public function show(Work $work): Response
    {
        return $this->render('work/show.html.twig', [
            'work' => $work,
        ]);
    }

    public function last():Response
    {
        $last_Works=$this->getDoctrine()->getRepository(Work::class)->findBy([],['date'=>'DESC'],6);
        return $this->render('work/_last-works.html.twig',['last_works'=>$last_Works]);
    }
}
