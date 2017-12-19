<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
  public function indexAction(Request $request)
  {

    //$artistRepository = $this->getDoctrine()->getRepository('AppBundle:Artist');
    //$artists = $artistRepository->findAll();
    $tracksRepository = $this->getDoctrine()->getRepository('AppBundle:Track');
    $tracks = $tracksRepository->findAll();

    return $this->render('@App/Default/index.html.twig', compact('tracks'));
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
