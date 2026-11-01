<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/admin/categories', name: 'admin_categories')]
    public function index(): Response
    {
        $categories = [
            ['id' => 1, 'name' => 'Bikes', 'slug' => 'bikes', 'parent' => null, 'product_count' => 8, 'is_active' => true],
            ['id' => 2, 'name' => 'Mountain Bikes', 'slug' => 'mountain-bikes', 'parent' => 'Bikes', 'product_count' => 4, 'is_active' => true],
            ['id' => 3, 'name' => 'Components', 'slug' => 'components', 'parent' => null, 'product_count' => 15, 'is_active' => true],
            ['id' => 4, 'name' => 'Apparel', 'slug' => 'apparel', 'parent' => null, 'product_count' => 6, 'is_active' => true],
            ['id' => 5, 'name' => 'Discontinued Frames', 'slug' => 'discontinued-frames', 'parent' => null, 'product_count' => 0, 'is_active' => false],
        ];

        return $this->render('admin/category/index.html.twig', [
            'categories' => $categories,
            'totalCategories' => count($categories)
        ]);
    }

    #[Route('/admin/categories/add', name: 'admin_categories_add')]
    public function add(): Response
    {
        $parentCategories = [
            ['id' => 1, 'name' => 'Bikes'],
            ['id' => 3, 'name' => 'Components'],
            ['id' => 4, 'name' => 'Apparel'],
            ['id' => 6, 'name' => 'Accessories'],
        ];

        return $this->render('admin/category/add.html.twig', [
            'parentCategories' => $parentCategories
        ]);
    }

    #[Route('/admin/categories/edit/{id}', name: 'admin_categories_edit')]
    public function edit(int $id): Response
    {
        $category = [
            'id' => $id,
            'name' => 'Bikes',
            'slug' => 'bikes',
            'parent_id' => null,
            'description' => 'All types of bicycles.',
            'is_active' => true
        ];

        $parentCategories = [
            ['id' => 1, 'name' => 'Bikes'],
            ['id' => 3, 'name' => 'Components'],
            ['id' => 4, 'name' => 'Apparel'],
            ['id' => 6, 'name' => 'Accessories'],
        ];

        return $this->render('admin/category/edit.html.twig', [
            'category' => $category,
            'parentCategories' => $parentCategories
        ]);
    }
}