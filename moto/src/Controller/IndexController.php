<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository
            ->createQueryBuilder('c')
            ->andWhere('c.parentId is null')
            ->getQuery()
            ->getResult();


        return $this->render('moto/index.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @param CategoryRepository $categoryRepository
     * @Route ("/category/{id}", name="category")
     * @return Response
     */
    public function showCategory(CategoryRepository  $categoryRepository, int $categoryId): Response
    {
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

        return $this->render('moto/subcategory.html.twig', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }
}
