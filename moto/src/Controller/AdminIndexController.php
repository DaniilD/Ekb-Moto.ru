<?php

namespace App\Controller;

use App\Enums\CategoryNames;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminIndexController extends AbstractController
{
    /**
     * @Route("/admin/", name="admin_index")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $mainCategories = [];

        $mainCategories[CategoryNames::OIL]                = $categoryRepository->findByName(CategoryNames::OIL);
        $mainCategories[CategoryNames::EQUIPMENT]          = $categoryRepository->findByName(CategoryNames::EQUIPMENT);
        $mainCategories[CategoryNames::MOTO_ACCESSORIES]   = $categoryRepository->findByName(CategoryNames::MOTO_ACCESSORIES);
        $mainCategories[CategoryNames::SPARES]             = $categoryRepository->findByName(CategoryNames::SPARES);
        $mainCategories[CategoryNames::TIRES_AND_CHAMBERS] = $categoryRepository->findByName(CategoryNames::TIRES_AND_CHAMBERS);


        return $this->render('admin/index.html.twig', [
            'mainCategories' => $mainCategories,
        ]);
    }
}
