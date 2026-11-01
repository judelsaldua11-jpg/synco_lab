<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UserController extends AbstractController
{
    #[Route('/admin/users', name: 'admin_users')]
    public function index(): Response
    {
        // 1. Mock Users Data
        $users = [
            [
                'id' => 1, 'name' => 'Admin User', 'email' => 'admin@syncrolab.com', 'phone' => '0917 100 0001',
                'role' => 'hq_admin', 'is_member' => true, 'expiry' => 'Dec 31, 2026', 'is_active' => true
            ],
            [
                'id' => 2, 'name' => 'Rico Villanueva', 'email' => 'rico.v@syncrolab.com', 'phone' => '0918 200 0002',
                'role' => 'branch_manager', 'is_member' => true, 'expiry' => 'Aug 15, 2026', 'is_active' => true
            ],
            [
                'id' => 3, 'name' => 'Maria Santos', 'email' => 'maria.santos@email.com', 'phone' => '0917 555 1234',
                'role' => 'customer', 'is_member' => true, 'expiry' => 'Nov 02, 2026', 'is_active' => true
            ],
            [
                'id' => 4, 'name' => 'Juan Dela Cruz', 'email' => 'juan.dc@email.com', 'phone' => '0918 222 4455',
                'role' => 'customer', 'is_member' => false, 'expiry' => null, 'is_active' => true
            ],
            [
                'id' => 5, 'name' => 'Carlo Mendoza', 'email' => 'carlo.m@email.com', 'phone' => '0919 333 7788',
                'role' => 'customer', 'is_member' => false, 'expiry' => null, 'is_active' => false
            ]
        ];

        // 2. Mock Payment Logs Data
        $paymentLogs = [
            [
                'name' => 'Maria Santos', 'email' => 'maria.santos@email.com',
                'method_icon' => '💙', 'method_label' => 'GCash', 'details' => '0917 555 1234',
                'reference' => 'GC-2026-0001', 'amount' => 499.00, 'action' => 'new',
                'status' => 'verified', 'start' => 'Jan 01, 2026', 'end' => 'Dec 31, 2026',
                'bike_fit' => true, 'deep_clean' => false, 'verified_at' => 'Jan 01, 2026 10:15 AM'
            ],
            [
                'name' => 'Juan Dela Cruz', 'email' => 'juan.dc@email.com',
                'method_icon' => '💚', 'method_label' => 'Maya', 'details' => '0918 222 4455',
                'reference' => 'MY-2026-0042', 'amount' => 499.00, 'action' => 'renewal',
                'status' => 'pending', 'start' => null, 'end' => null,
                'bike_fit' => false, 'deep_clean' => false, 'verified_at' => null
            ],
            [
                'name' => 'Rico Villanueva', 'email' => 'rico.v@syncrolab.com',
                'method_icon' => '💳', 'method_label' => 'Card', 'details' => '•••• 4242',
                'reference' => 'CD-2026-0007', 'amount' => 499.00, 'action' => 'new',
                'status' => 'verified', 'start' => 'Aug 15, 2026', 'end' => 'Aug 14, 2027',
                'bike_fit' => false, 'deep_clean' => false, 'verified_at' => 'Aug 15, 2026 02:33 PM'
            ],
            [
                'name' => 'Carlo Mendoza', 'email' => 'carlo.m@email.com',
                'method_icon' => '💙', 'method_label' => 'GCash', 'details' => '0919 333 7788',
                'reference' => 'GC-2026-0091', 'amount' => 499.00, 'action' => 'new',
                'status' => 'failed', 'start' => null, 'end' => null,
                'bike_fit' => false, 'deep_clean' => false, 'verified_at' => null
            ]
        ];

        return $this->render('admin/user/index.html.twig', [
            'users' => $users,
            'paymentLogs' => $paymentLogs,
            'totalUsers' => count($users)
        ]);
    }
}