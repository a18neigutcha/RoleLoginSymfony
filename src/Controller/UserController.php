<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Repository\ProductRepository;
use App\Entity\User;


class UserController extends AbstractController
{
    /**
     * @Route("/", name="inicio")
     */
    public function index()
    {
        return $this->redirectToRoute('app_login');
    }

}
