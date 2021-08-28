<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    /**
     * @Route("/",name="default")
     */
    public function default()
    {
        return $this->redirectToRoute("homepage");
    }
    /**
     * @Route("/home",name="homepage")
     */
    public function index()
    {
        return $this->redirectToRoute("app_login");
    }
}