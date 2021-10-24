<?php

namespace App\Controller;

use App\Enums\CategoryNames;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminProductController extends AbstractController
{
    /**
     * @Route("/admin/products", name="admin_product")
     */
    public function index(ProductRepository $productRepository, CategoryRepository $categoryRepository): Response
    {
        $products = $productRepository->findAll();

        $mainCategories = [];

        $mainCategories[CategoryNames::OIL]                = $categoryRepository->findByName(CategoryNames::OIL);
        $mainCategories[CategoryNames::EQUIPMENT]          = $categoryRepository->findByName(CategoryNames::EQUIPMENT);
        $mainCategories[CategoryNames::MOTO_ACCESSORIES]   = $categoryRepository->findByName(CategoryNames::MOTO_ACCESSORIES);
        $mainCategories[CategoryNames::SPARES]             = $categoryRepository->findByName(CategoryNames::SPARES);
        $mainCategories[CategoryNames::TIRES_AND_CHAMBERS] = $categoryRepository->findByName(CategoryNames::TIRES_AND_CHAMBERS);

        return $this->render('admin/products.html.twig', [
            'products'=>$products,
            'mainCategories'=>$mainCategories
        ]);
    }
}
