<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/admin/products', name: 'admin_products')]
    public function index(): Response
    {
        $products = [
            ['id' => 1, 'name' => 'Chain Set Bottom Bracket', 'brand' => 'Shimano', 'sku' => 'CS-BB-100', 'total_stock' => 12, 'is_featured' => true, 'image' => null],
            ['id' => 2, 'name' => 'Chain 11-Speed', 'brand' => 'SRAM', 'sku' => 'CS-CH-200', 'total_stock' => 7, 'is_featured' => false, 'image' => null],
            ['id' => 3, 'name' => 'Wheel Rear Disc', 'brand' => 'DT Swiss', 'sku' => 'WH-RD-300', 'total_stock' => 3, 'is_featured' => true, 'image' => null],
            ['id' => 4, 'name' => 'Frame Mountain', 'brand' => 'Trek', 'sku' => 'FR-MT-500', 'total_stock' => 0, 'is_featured' => false, 'image' => null]
        ];

        return $this->render('admin/product/index.html.twig', [
            'products' => $products
        ]);
    }

    #[Route('/admin/products/add', name: 'admin_products_add')]
    public function add(): Response
    {
        $categories = [
            ['id' => 1, 'name' => 'Bikes'],
            ['id' => 2, 'name' => 'Components'],
            ['id' => 3, 'name' => 'Apparel'],
            ['id' => 4, 'name' => 'Accessories'],
        ];

        return $this->render('admin/product/add.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/admin/products/edit/{id}', name: 'admin_products_edit')]
    public function edit(int $id): Response
    {
        // Mock Product Data
        $product = [
            'id' => $id,
            'name' => 'Chain Set Bottom Bracket',
            'sku' => 'CS-BB-100',
            'brand' => 'Shimano',
            'price' => 2500.00,
            'description' => 'High-quality bottom bracket for smooth pedaling.',
            'is_featured' => true,
            'category_ids' => [2] // Pre-selected "Components"
        ];

        $categories = [
            ['id' => 1, 'name' => 'Bikes'],
            ['id' => 2, 'name' => 'Components'],
            ['id' => 3, 'name' => 'Apparel'],
            ['id' => 4, 'name' => 'Accessories'],
        ];

        // Mock Existing Images
        $productImages = [
            ['id' => 101, 'file_path' => 'images/syncro-lab-dark.svg', 'is_primary' => true],
            ['id' => 102, 'file_path' => 'images/syncro-lab-light.svg', 'is_primary' => false]
        ];

        return $this->render('admin/product/edit.html.twig', [
            'product' => $product,
            'categories' => $categories,
            'productImages' => $productImages
        ]);
    }
}