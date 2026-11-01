<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MembershipController extends AbstractController
{
    #[Route('/admin/membership', name: 'admin_membership')]
    public function index(): Response
    {
        return $this->render('admin/membership/index.html.twig', [
            'controller_name' => 'MembershipController',
        ]);
    }
}
