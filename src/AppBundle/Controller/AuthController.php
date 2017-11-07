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
        return $this->redirectToRoute('new_message');
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction()
    {
        return $this->redirectToRoute('new_message');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        return $this->redirectToRoute('new_message');
    }
}
