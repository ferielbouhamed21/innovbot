<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    /**
     * @Route("/main",name="app_home")
     */
    public function index()
    {
    return $this->render('Home/main.html.twig');
    }
}