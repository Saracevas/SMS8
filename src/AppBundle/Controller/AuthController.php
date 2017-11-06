<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class AuthController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/new_message.html.twig', ['loggedIn' => true]);
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/new_message.html.twig', ['loggedIn' => true]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', ['loggedIn' => true]);
    }
}
