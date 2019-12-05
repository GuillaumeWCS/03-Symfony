<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/wild/category/add", name="category_add")
     * @return Response A response instance
     */
    public function add(): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category)
            ->add("submit", SubmitType::class);

        return $this->render("category/add.html.twig", [
            "form" => $form->createView(),
        ]);

    }

}