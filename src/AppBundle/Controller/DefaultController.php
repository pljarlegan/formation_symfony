<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
  public function indexAction(Request $request)
  {

    $bob = '123';
    dump($request);
    dump($bob);
    return new Response('moo</body>');
    //return new RedirectResponse('http://google.fr');
    //return new JsonResponse([
    //  'toto'=>'123',
    //  'bob'=>'</body>'
    //]);
    //return $this->render('AppBundle:Default:index.html.twig');
  }

  public function contactAction()
  {
    return new Response('contact');
  }
}
