<?php

namespace App\Controller;

use phpDocumentor\Reflection\Location;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */
    public function index(): Response
    {
        return $this->render("wild/index.html.twig", ["website" => "Bienvenue sur Wild Series"]);
    }

    /**
     * @Route ("/wild/show/{slug}", requirements={"slug"="[a-z0-9-]+"}, name="wild_show")
     */
    // return bien une 404 si les requirements ne sont pas validés
    public function show(string $slug): Response
    {
        $newStr = str_replace("-", " ",$slug);
        $newStr = ucwords($newStr);
        return $this->render("wild/show.html.twig", ["parameter" => $newStr]);
    }
}
