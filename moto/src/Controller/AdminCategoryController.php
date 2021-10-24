<?php

namespace App\Controller;

use App\Enums\CategoryNames;
use App\Form\CreateCategoryForm;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminCategoryController extends AbstractController
{
    /**
     * @Route("/admin/category/{id}", name="admin_category")
     */
    public function index(Request $request, CategoryRepository $categoryRepository): Response
    {
        $categoryId = $request->attributes->getInt("id");


        $mainCategories = [];

        $mainCategories[CategoryNames::OIL]                = $categoryRepository->findByName(CategoryNames::OIL);
        $mainCategories[CategoryNames::EQUIPMENT]          = $categoryRepository->findByName(CategoryNames::EQUIPMENT);
        $mainCategories[CategoryNames::MOTO_ACCESSORIES]   = $categoryRepository->findByName(CategoryNames::MOTO_ACCESSORIES);
        $mainCategories[CategoryNames::SPARES]             = $categoryRepository->findByName(CategoryNames::SPARES);
        $mainCategories[CategoryNames::TIRES_AND_CHAMBERS] = $categoryRepository->findByName(CategoryNames::TIRES_AND_CHAMBERS);

        $category             = $categoryRepository->find($categoryId);
        $categoriesInCategory = $categoryRepository->createQueryBuilder('c')
            ->andWhere('c.parentId = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->getQuery()
            ->getResult();

        return $this->render('admin/category.html.twig', [
            'category'       => $category,
            'categories'     => $categoriesInCategory,
            'mainCategories' => $mainCategories,
        ]);
    }

    /**
     * @param Request            $request
     * @param CategoryRepository $categoryRepository
     *
     * @return Response
     *
     * @Route("/admin/category/create/{id}", name="admin_category_create")
     */
    public function create(Request $request, CategoryRepository $categoryRepository): Response
    {
        $categoryId = $request->attributes->getInt("id");


        $mainCategories = [];

        $mainCategories[CategoryNames::OIL]                = $categoryRepository->findByName(CategoryNames::OIL);
        $mainCategories[CategoryNames::EQUIPMENT]          = $categoryRepository->findByName(CategoryNames::EQUIPMENT);
        $mainCategories[CategoryNames::MOTO_ACCESSORIES]   = $categoryRepository->findByName(CategoryNames::MOTO_ACCESSORIES);
        $mainCategories[CategoryNames::SPARES]             = $categoryRepository->findByName(CategoryNames::SPARES);
        $mainCategories[CategoryNames::TIRES_AND_CHAMBERS] = $categoryRepository->findByName(CategoryNames::TIRES_AND_CHAMBERS);

        $form = $this->createForm(CreateCategoryForm::class);


        return $this->render('admin/category_create.html.twig', [
            'parentCategoryId' => $categoryId,
            'mainCategories'   => $mainCategories,
            'form'             => $form->createView(),
        ]);
    }

    /**
     * @param Request            $request
     * @param CategoryRepository $categoryRepository
     *
     * @return Response
     *
     */
    public function createCategory(Request $request, CategoryRepository $categoryRepository): Response
    {
        $name      = $request->request->get("image");
        $parent_id = $request->request->get("parent_id");
        $image     = $request->request->get("image");


    }

}
