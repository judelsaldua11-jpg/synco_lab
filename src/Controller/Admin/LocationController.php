<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LocationController extends AbstractController
{
    #[Route('/admin/locations', name: 'admin_locations')]
    public function index(): Response
    {
        // Mock Locations Data
        $locations = [
            [
                'id' => 1, 'name' => 'Dumaguete Main', 'phone' => '0917 555 0001',
                'address' => '123 Rizal Avenue, Dumaguete City, Negros Oriental 6200',
                'is_active' => true
            ],
            [
                'id' => 2, 'name' => 'Bacolod Branch', 'phone' => '0918 222 0002',
                'address' => '456 Lacson Street, Bacolod City, Negros Occidental 6100',
                'is_active' => true
            ],
            [
                'id' => 3, 'name' => 'Cebu Satellite', 'phone' => null, // Testing 'No phone' fallback
                'address' => '789 Osmeña Boulevard, Cebu City, Cebu 6000',
                'is_active' => false
            ]
        ];

        return $this->render('admin/location/index.html.twig', [
            'locations' => $locations,
            'totalLocations' => count($locations)
        ]);
    }

    #[Route('/admin/locations/add', name: 'admin_locations_add')]
    public function add(): Response
    {
        return $this->render('admin/location/add.html.twig');
    }

    #[Route('/admin/locations/edit/{id}', name: 'admin_locations_edit')]
    public function edit(int $id): Response
    {
        // Mock Location Data
        $location = [
            'id' => $id,
            'name' => 'Dumaguete Main',
            'address' => '123 Rizal Avenue, Dumaguete City, Negros Oriental 6200',
            'maps_url' => 'https://www.google.com/maps/search/?api=1&query=9.3167+123.3167',
            'contact_phone' => '0917 555 0001',
            'contact_email' => 'dumaguete@syncrolab.com',
            'is_active' => true
        ];

        return $this->render('admin/location/edit.html.twig', [
            'location' => $location
        ]);
    }
}