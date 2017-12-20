<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DefaultController extends Controller
{
  public function indexAction(Request $request)
  {

    //$artistRepository = $this->getDoctrine()->getRepository('AppBundle:Artist');
    //$artists = $artistRepository->findAll();
    $tracksRepository = $this->getDoctrine()->getRepository('AppBundle:Track');
    //$tracks = $tracksRepository->findAll();

    $tracks = $tracksRepository->loadTrackWithArtists();
    return $this->render('@App/Default/index.html.twig', compact('tracks'));
    //return new RedirectResponse('http://google.fr');
    //return new JsonResponse([
    //  'toto'=>'123',
    //  'bob'=>'</body>'
    //]);
    //return $this->render('AppBundle:Default:index.html.twig');
  }

  public function contactAction(Request $request)
  {

    $builder = $this->createFormBuilder();
    $builder
      ->add('name', TextType::class, [
        'constraints'=> [
          new NotBlank(),
          new Length(['min' => 3])
        ]
      ])
      ->add('email', EmailType::class, [
        'constraints' => [
          new NotBlank(),
          new Email(['checkHost'=>true, 'checkMX'=>true]),
        ],
        'attr' => [
          'class' => 'bob',
          'pattern' => '^[0-9a- ]'
        ]
      ])
      ->add('message', TextareaType::class,[
        'constraints' => [
          new NotBlank()
        ]
      ]);

    $form = $builder->getForm();
    $form->handleRequest($request);

    $data = [];
    if($form->isSubmitted() && $form->isValid()){
      $data = $form->getData();
      // DO something
      //return $this->redirectToRoute('app_homepage');
    }

    return $this->render('@App/Default/contact.html.twig',[
      'form'=>$form->createView(),
      'data'=>$data
    ]);
    //return new Response('contact');
  }
}
