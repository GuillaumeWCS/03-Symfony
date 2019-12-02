<?php

namespace App\Controller;

use phpDocumentor\Reflection\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Program;
use App\Entity\Season;
use App\Entity\Category;
use App\Entity\Episode;

class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     * @return Response A response instance
     */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        if (!$programs) {
            throw $this->createNotFoundException('No program found in program\'s table.');
        }

        return $this->render("wild/index.html.twig", ["programs" => $programs]);
    }

    /**
     * Getting a program with a formatted slug for title
     *
     * @param string $slug The slugger
     * @Route("/show/{slug<^[a-z0-9-]+$>}", defaults={"slug" = null}, name="show")
     * @return Response
     */
    public function show(?string $slug):Response
    {
        if (!$slug) {
            throw $this
                ->createNotFoundException('No slug has been sent to find a program in program\'s table.');
        }
        $slug = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($slug)), "-")
        );
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['title' => mb_strtolower($slug)]);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with '.$slug.' title, found in program\'s table.'
            );
        }

        return $this->render('wild/show.html.twig', [
            'program' => $program,
            'slug'  => $slug,
        ]);
    }

    /**
     * @Route("/wild/category/{categoryName<^[a-z0-9-]+$>}", name="show_category")
     * @return Response A response instance
     */
    public function showByCategory(string $categoryName): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(['name' => mb_strtolower($categoryName)]);

        //dd($category);

        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findBy(['category' => $category], ['id' => "DESC"], 3);

        //dd($programs);


        if (!$category) {
            throw $this->createNotFoundException('No category send');
        }

        return $this->render("wild/category.html.twig", ["programs" => $programs]);
    }


    /**
     * @Route("/wild/program/{slug<^[a-z0-9-]+$>}", name="show_program")
     */
    public function showByProgram(string $slug): Response
    {
        if (!$slug) {
            throw $this
                ->createNotFoundException('No slug has been sent to find a program in program\'s table.');
        }

        $slug = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($slug)), "-")
        );

        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(["title" => $slug]);

        $seasons = $this->getDoctrine()
            ->getRepository(Season::class)
            ->findBy(["program" => $program]);

        return $this->render("wild/program.html.twig", [
            "program" => $program,
            "seasons" => $seasons,
        ]);
    }

    /**
     * @Route ("wild/season/{id<^[0-9-]+$>}", name="show_season")
     */
    public function showBySeason(int $id): Response
    {
        $season = $this->getDoctrine()
            ->getRepository(Season::class)
            ->find(["id" => $id]);


        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(["id" => $id]);

        $episodes = $this->getDoctrine()
            ->getRepository(Episode::class)
            ->findOneBy(["id" => $id]);

        //dd($episode);

        return $this->render("wild/season.html.twig", [
            "season" => $season,
            "program" => $program,
            "episodes" => $episodes,
        ]);
    }
}
