<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DashboardController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'admin_dashboard')]
    public function index(): Response
    {
        // 1. Mock Stats
        $stats = [
            'revenue' => 15400.00,
            'pending_orders' => 3,
            'pending_bookings' => 0,
            'pending_refunds' => 1,
            'claims_mtd' => 2,
            'stock' => 142,
        ];

        // 2. Mock Quick Links
        $links = [
            ['route' => 'admin_orders', 'icon' => '🛒', 'title' => 'Orders', 'desc' => 'Fulfillment & tracking'],
            ['route' => 'admin_bookings', 'icon' => '📅', 'title' => 'Bookings', 'desc' => 'Service appointments'],
            ['route' => 'admin_inventory', 'icon' => '📦', 'title' => 'Inventory', 'desc' => 'Multi-branch stock'],
            ['route' => 'admin_products', 'icon' => '🏷️', 'title' => 'Catalog', 'desc' => 'Products & prices'],
            ['route' => 'admin_locations', 'icon' => '📍', 'title' => 'Locations', 'desc' => 'Branch hubs'],
            ['route' => 'admin_users', 'icon' => '👥', 'title' => 'Users', 'desc' => 'Accounts & roles'],
            ['route' => null, 'anchor' => '#membership', 'icon' => '💎', 'title' => 'Membership', 'desc' => '₱ 499.00'],
        ];

        // 3. Mock Refund List (Empty to show empty state, or 1 row to show table)
        $refunds = [
            [
                'id' => '00001', 'order_id' => '00042', 'amount' => 850.00, 'payment_method' => 'GCash',
                'customer_name' => 'Maria Santos', 'customer_email' => 'maria@email.com', 'branch_name' => 'Dumaguete Main',
                'reason' => 'Item arrived damaged.'
            ]
        ];

        // 4. Mock Claims List
        $claims = [
            [
                'date' => 'Oct 24, 2026', 'time' => '10:15 AM', 'member_name' => 'Ana Reyes', 'member_email' => 'ana@email.com',
                'benefit' => '10% Discount', 'branch_name' => 'Dumaguete Main', 'applied_to' => 'Order #00040', 'notes' => '-'
            ]
        ];

        // 5. Mock Activity Log
        $activities = [
            [
                'date' => 'Oct 24, 2026 09:30 AM', 'user' => 'Admin User', 'branch' => 'Dumaguete Main',
                'product' => 'Chain Set Bottom Bracket', 'action' => '➕ Stock Added', 'details' => 'Added 5 item(s)'
            ]
        ];

        // 6. Membership Settings
        $membership = ['price' => 499.00, 'duration' => 12, 'active_members' => 24];

        return $this->render('admin/dashboard/index.html.twig', [
            'stats' => $stats,
            'links' => $links,
            'refunds' => $refunds,
            'claims' => $claims,
            'activities' => $activities,
            'membership' => $membership
        ]);
    }
}