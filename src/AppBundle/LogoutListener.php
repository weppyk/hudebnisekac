<?php

namespace AppBundle;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LogoutListener extends Controller implements  LogoutSuccessHandlerInterface
{
    public function onLogoutSuccess(Request $request)
    {
        #return $this->redirectToRoute('homepage');
        return new Response('Byl jste odhlášen', 401);
    }
}