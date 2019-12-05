<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/wild/category/add", name="category_add")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response A response instance
     */
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $form = $this
            ->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category); // persist un objet pas le form
            $entityManager->flush();
        }

        return $this->render("category/add.html.twig", [
            "form" => $form->createView(),
        ]);

    }

}
