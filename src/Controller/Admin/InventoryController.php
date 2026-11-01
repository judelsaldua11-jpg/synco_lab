<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InventoryController extends AbstractController
{
    #[Route('/admin/inventory', name: 'admin_inventory')]
    public function index(): Response
    {
        $statusOptions = [
            ['key' => 'in_stock', 'label' => 'In stock'],
            ['key' => 'reserved', 'label' => 'Reserved'],
            ['key' => 'sold', 'label' => 'Sold'],
        ];

        $branches = [
            ['id' => 1, 'name' => 'Dumaguete Main'],
            ['id' => 2, 'name' => 'Bacolod Branch'],
        ];

        // MOCK DATA: Simulating the DB join of inventory, products, and branches
        $inventoryItems = [
            [
                'id' => 1, 'product_name' => 'Chain Set Bottom Bracket', 'sku' => 'CS-BB-100',
                'serial_number' => 'CS-BB-001', 'branch_name' => 'Dumaguete Main', 
                'status_key' => 'in_stock', 'status_label' => 'In stock'
            ],
            [
                'id' => 2, 'product_name' => 'Chain Set Bottom Bracket', 'sku' => 'CS-BB-100',
                'serial_number' => 'CS-BB-002', 'branch_name' => 'Dumaguete Main', 
                'status_key' => 'in_stock', 'status_label' => 'In stock'
            ],
            [
                'id' => 3, 'product_name' => 'Chain 11-Speed', 'sku' => 'CS-CH-200',
                'serial_number' => 'CS-CH-001', 'branch_name' => 'Bacolod Branch', 
                'status_key' => 'reserved', 'status_label' => 'Reserved'
            ],
            [
                'id' => 4, 'product_name' => 'Wheel Rear Disc', 'sku' => 'WH-RD-300',
                'serial_number' => 'WH-RD-001', 'branch_name' => 'Dumaguete Main', 
                'status_key' => 'sold', 'status_label' => 'Sold'
            ]
        ];

        return $this->render('admin/inventory/index.html.twig', [
            'inventoryItems' => $inventoryItems,
            'statusOptions' => $statusOptions,
            'branches' => $branches,
            'totalItems' => count($inventoryItems)
        ]);
    }
}