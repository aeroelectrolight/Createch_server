<?php

namespace AppBundle\Controller\Settings;

/**
 * Description of PersonnelController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Settings\Personnel;
use AppBundle\Form\Settings\PersonnelType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonnelController extends FOSRestController{
    
    public function getPersonnelsAction() {
        $em = $this->getDoctrine()->getManager();
        $personnels = $em->getRepository('AppBundle:Settings\Personnel')->findAll();
        return $personnels;
    }
    
    public function getPersonnelAction($id) {
        $em = $this->getDoctrine()->getManager();
        $personnel = $em->getRepository('AppBundle:Settings\Personnel')->find($id);
        return $personnel;
    }
    
    public function postPersonnelAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $personnel = new Personnel;
        $form = $this->createForm(PersonnelType::class, $personnel);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personnel);
            $em->flush();
            $response = $em->getRepository('AppBundle:Settings\Personnel')->findByUser($personnel->getUser());
            return $response;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putPersonnelAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $personnel = $em->getRepository('AppBundle:Settings\Personnel')->find($id);
        $form = $this->createForm(PersonnelType::class, $personnel);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($personnel);
            $em->flush();
            return $personnel;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deletePersonnelAction($id) {
        $em = $this->getDoctrine()->getManager();
        $personnel = $em->getRepository('AppBundle:Settings\Personnel')->find($id);
        $em->remove($personnel);
        $em->flush();
    }
}
