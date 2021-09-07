<?php

namespace App\Controller;

use App\Security\RegisterFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->get('security.authorization_checker')->isGranted ("ROLE_USER") ){
             return $this->redirectToRoute('app_home');
         }
        else if ($this->get('security.authorization_checker')->isGranted ("ROLE_ADMIN" && "ROLE_USER")){
            return $this->redirectToRoute('admin');
        }
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/signup", name="sign_up")
     */
    public function signup(Request $request, RegisterFormAuthenticator $authenticator)
    {
        if ($request->isMethod("POST")){
            $user = $authenticator->createAccount($request);
        }
        return $this->redirectToRoute('app_login');
    }
}
