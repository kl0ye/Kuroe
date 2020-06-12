<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
     /**
     * @Route("/api/inscription", name="app_registration")
     */
    public function createUserAction(UserPasswordEncoderInterface $encoder) {

        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setEmail('c.poineau@free.fr');
        $pass = 'azerty';
        $roles[] = 'ROLE_USER';
        $user->setRoles($roles);
        $encoded = $encoder->encodePassword($user, $pass);
        $user->setPassword($encoded);
        $entityManager->persist($user);
        $entityManager->flush();
    
        return new Response('Add new user');

    }
    /**
     * @Route("/api/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
 
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->json('login OK', 200);
    }

    /**
     * @Route("/api/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
