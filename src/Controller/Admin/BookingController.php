<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingController extends AbstractController
{
    #[Route('/admin/bookings', name: 'admin_bookings')]
    public function index(): Response
    {
        $bookings = [
            [
                'id' => 101,
                'customer_name' => 'Maria Santos',
                'status_key' => 'pending',
                'status_label' => 'Pending Review',
                'is_member' => true,
                'service_label' => 'Repair Maintenance',
                'scheduled_date' => 'Saturday, Apr 12, 2026 @ 10:00 AM',
                'branch_name' => 'Dumaguete Main',
                'customer_email' => 'maria.santos@email.com',
                'customer_phone' => '0917 555 1234',
                'notes' => 'Rear derailleur skipping gears on climbs.',
                'cycle_start' => 'Jan 01, 2026',
                'benefits' => [
                    ['label' => '10% Discount', 'type' => 'unlimited'],
                    ['label' => 'Priority Booking', 'type' => 'unlimited'],
                    ['label' => 'Annual Bike Fit', 'type' => 'available'],
                    ['label' => 'Deep Clean', 'type' => 'used', 'date' => 'Mar 15, 2026'],
                ],
                'available_benefits' => [
                    'discount_10' => '10% Discount',
                    'annual_bike_fit' => 'Annual Bike Fit',
                    'priority_booking' => 'Priority Booking'
                ]
            ],
            [
                'id' => 102,
                'customer_name' => 'Juan Dela Cruz',
                'status_key' => 'confirmed',
                'status_label' => 'Confirmed',
                'is_member' => false,
                'service_label' => 'Custom Build',
                'scheduled_date' => 'Monday, Apr 14, 2026 @ 02:30 PM',
                'branch_name' => 'Bacolod Branch',
                'customer_email' => 'juan.dc@email.com',
                'customer_phone' => '0918 222 4455',
                'notes' => 'Wants gravel-ready setup with 40mm tires.',
                'cycle_start' => null,
                'benefits' => [],
                'available_benefits' => []
            ],
            [
                'id' => 103,
                'customer_name' => 'Ana Reyes',
                'status_key' => 'in_progress',
                'status_label' => 'In Workshop',
                'is_member' => true,
                'service_label' => 'Annual Bike Fit',
                'scheduled_date' => 'Wednesday, Apr 09, 2026 @ 09:00 AM',
                'branch_name' => 'Dumaguete Main',
                'customer_email' => 'ana.reyes@email.com',
                'customer_phone' => '0920 888 7766',
                'notes' => null,
                'cycle_start' => 'Jan 01, 2026',
                'benefits' => [
                    ['label' => '10% Discount', 'type' => 'unlimited'],
                    ['label' => 'Priority Booking', 'type' => 'unlimited'],
                    ['label' => 'Annual Bike Fit', 'type' => 'used', 'date' => 'Feb 20, 2026'],
                    ['label' => 'Deep Clean', 'type' => 'used', 'date' => 'Mar 05, 2026'],
                ],
                'available_benefits' => [] // Empty to trigger the "All cycle-limited benefits claimed" warning
            ]
        ];

        return $this->render('admin/booking/index.html.twig', [
            'bookings' => $bookings
        ]);
    }
}