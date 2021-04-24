<?php

namespace App\Controller;

use App\Enums\CategoryNames;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository
            ->createQueryBuilder('c')
            ->andWhere('c.parentId is null')
            ->getQuery()
            ->getResult();

        $mainCategories = [];

        $mainCategories[CategoryNames::OIL]                = $categoryRepository->findByName(CategoryNames::OIL);
        $mainCategories[CategoryNames::EQUIPMENT]          = $categoryRepository->findByName(CategoryNames::EQUIPMENT);
        $mainCategories[CategoryNames::MOTO_ACCESSORIES]   = $categoryRepository->findByName(CategoryNames::MOTO_ACCESSORIES);
        $mainCategories[CategoryNames::SPARES]             = $categoryRepository->findByName(CategoryNames::SPARES);
        $mainCategories[CategoryNames::TIRES_AND_CHAMBERS] = $categoryRepository->findByName(CategoryNames::TIRES_AND_CHAMBERS);


        return $this->render('moto/index.html.twig', [
            'categories'        => $categories,
            'mainCategories'    => $mainCategories,
            'categoryNamesEnum' => new CategoryNames,
        ]);
    }

    /**
     * @param CategoryRepository $categoryRepository
     * @Route ("/category/{id}", name="category")
     *
     * @return Response
     */
    public function showCategory(Request $request, CategoryRepository $categoryRepository): Response
    {
        $categoryId = $request->attributes->getInt("id");


        $categories = $categoryRepository
            ->createQueryBuilder('c')
            ->andWhere('c.parentId is null')
            ->getQuery()
            ->getResult();

        $category = $categoryRepository->find($categoryId);

        if ($category->getName() === CategoryNames::SPARES) {
            $subcategories = $categoryRepository
                ->createQueryBuilder('c')
                ->andWhere('c.parentId = :categoryId')
                ->setParameter('categoryId', $categoryId)
                ->getQuery()
                ->getResult();

            return $this->render('moto/subcategory.html.twig', [
                'categories'    => $categories,
                'subcategories' => $subcategories,
            ]);

        }

        return $this->render('moto/products.html.twig',
            [
                'categories' => $categories
            ]
        );

    }
}
