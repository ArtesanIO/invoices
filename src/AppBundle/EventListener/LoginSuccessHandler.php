<?php

namespace AppBundle\EventListener;

use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    protected $router;
    protected $securityTokenStorage;
    protected $securityChecker;

    public function __construct(Router $router, $securityTokenStorage, $securityChecker)
    {
        $this->router   = $router;
        $this->securityTokenStorage = $securityTokenStorage;
        $this->securityChecker = $securityChecker;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $user = $this->securityTokenStorage->getToken()->getUser();

        if ($this->securityChecker->isGranted('ROLE_USER')){
            $response = new RedirectResponse($this->router->generate('blocks'));
        }

        return $response;
    }
}