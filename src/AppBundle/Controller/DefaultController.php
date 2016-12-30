<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Settings\Groupe;
use AppBundle\Form\Settings\GroupeType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle::index.html.twig'
        );
    }
    
    public function testAction(Request $request)
    {
        $groupe = new \AppBundle\Entity\Events\Events;
        $form = $this->createForm(\AppBundle\Form\Events\EventsType::class, $groupe);
        if ($request->getMethod() === 'POST') {
            $data = $request->getContent();
            dump($data);
            exit;
        }
        return $this->render('AppBundle:Default:index.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
