<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OrderController extends AbstractController
{
    #[Route('/admin/orders', name: 'admin_orders')]
    public function index(): Response
    {
        $statusCounts = [
            'all' => 4, 'pending' => 1, 'confirmed' => 1, 'shipped' => 1, 
            'delivered' => 1, 'cancelled' => 0, 'returned' => 0,
        ];

        $branches = [
            ['id' => 1, 'name' => 'Dumaguete Main'],
            ['id' => 2, 'name' => 'Bacolod Branch'],
        ];

        // MOCK DATA: This represents exactly what $orderRepository->findAll() will return later.
        $orders = [
            [
                'id' => 42, 'order_num' => '00042', 'date' => 'Apr 03, 2026', 'time' => '10:24 AM',
                'customer_name' => 'Maria Santos', 'customer_email' => 'maria.santos@email.com',
                'is_member' => true, 'branch_name' => 'Dumaguete Main', 'item_count' => 2, 
                'total_amount' => 8500.00, 'has_discount' => true, 'discount_amount' => 850.00, 
                'payment_label' => 'GCash', 'status_key' => 'pending', 'status_label' => 'Pending', 
                'pending_refunds' => 1, 'is_final' => false
            ],
            [
                'id' => 41, 'order_num' => '00041', 'date' => 'Apr 02, 2026', 'time' => '03:47 PM',
                'customer_name' => 'Juan Dela Cruz', 'customer_email' => 'juan.dc@email.com',
                'is_member' => false, 'branch_name' => 'Bacolod Branch', 'item_count' => 1, 
                'total_amount' => 2300.00, 'has_discount' => false, 'discount_amount' => 0, 
                'payment_label' => 'COD', 'status_key' => 'confirmed', 'status_label' => 'Confirmed', 
                'pending_refunds' => 0, 'is_final' => false
            ],
            [
                'id' => 40, 'order_num' => '00040', 'date' => 'Apr 01, 2026', 'time' => '09:12 AM',
                'customer_name' => 'Ana Reyes', 'customer_email' => 'ana.reyes@email.com',
                'is_member' => true, 'branch_name' => 'Dumaguete Main', 'item_count' => 3, 
                'total_amount' => 15200.00, 'has_discount' => true, 'discount_amount' => 1520.00, 
                'payment_label' => 'Credit Card', 'status_key' => 'shipped', 'status_label' => 'Shipped', 
                'pending_refunds' => 0, 'is_final' => false
            ],
            [
                'id' => 39, 'order_num' => '00039', 'date' => 'Mar 30, 2026', 'time' => '02:05 PM',
                'customer_name' => 'Carlo Mendoza', 'customer_email' => 'carlo.m@email.com',
                'is_member' => false, 'branch_name' => 'Dumaguete Main', 'item_count' => 1, 
                'total_amount' => 4100.00, 'has_discount' => false, 'discount_amount' => 0, 
                'payment_label' => 'GCash', 'status_key' => 'delivered', 'status_label' => 'Delivered', 
                'pending_refunds' => 0, 'is_final' => true
            ]
        ];

        return $this->render('admin/order/index.html.twig', [
            'statusCounts' => $statusCounts,
            'branches' => $branches,
            'orders' => $orders,
        ]);
    }
}