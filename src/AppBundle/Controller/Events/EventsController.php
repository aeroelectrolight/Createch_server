<?php

namespace AppBundle\Controller\Events;

/**
 * Description of EventsController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Events\Events;
use AppBundle\Form\Events\EventsType;

class EventsController extends FOSRestController{

    public function getEventsAction() {
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('AppBundle:Events\Events')->findAll();
        return $events;
    }

    public function getEventAction($id) {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Events\Events')->find($id);
        return $event;
    }

    public function postEventAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $event = new Events;
        $form = $this->createForm(EventsType::class, $event);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            $response = $em->getRepository('AppBundle:Events\Events')->findByTitle($event->getTitle());
            return $response;
        } else {
            $errors =  $this->get('form_serializer')->serializeFormErrors($form,true,true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putEventAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('AppBundle:Events\Events')->find($id);
        $form = $this->createForm(EventsType::class, $event);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($event);
            $em->flush();
            return $event;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deleteEventAction($id) {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository("AppBundle:Events\Events")->find($id);
        $em->remove($event);
        $em->flush();
    }
}
