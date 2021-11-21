<?php

namespace App\Controller;

use App\Entity\Category;
use App\Enums\CategoryNames;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
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
    public function showCategory(Request $request, CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $categoryId = $request->attributes->getInt("id");


        $categories = $categoryRepository
            ->createQueryBuilder('c')
            ->andWhere('c.parentId is null')
            ->getQuery()
            ->getResult();

        $subcategories = $categoryRepository
            ->createQueryBuilder('c')
            ->andWhere('c.parentId = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->getQuery()
            ->getResult();


        if (empty($subcategories)) {
            /**
             * @todo заменить на 404 redirect
             */
            return $this->redirect('/');
        }

        $template = '';
        switch ($subcategories[0]->getLevel()) {
            case 2:
                $template = 'moto/category_lvl_1.html.twig';
                break;
            case 3:
                $template = 'moto/category_lvl_2.html.twig';
        }

        return $this->render($template, [
            'categories'    => $categories,
            'subcategories' => $subcategories,
        ]);

    }

    /**
     * @param Request           $request
     * @param ProductRepository $productRepository
     *
     * @Route ("/product/{id}", name="product")
     */
    public function showProduct(Request $request, CategoryRepository $categoryRepository, ProductRepository $productRepository): Response
    {
        $productId = $request->attributes->getInt("id");

        $categories = $categoryRepository
            ->createQueryBuilder('c')
            ->andWhere('c.parentId is null')
            ->getQuery()
            ->getResult();


        $product = $productRepository->find($productId);

        return $this->render('moto/product.html.twig',
            [
                'categories' => $categories,
                'product'    => $product,
            ]
        );
    }

}
