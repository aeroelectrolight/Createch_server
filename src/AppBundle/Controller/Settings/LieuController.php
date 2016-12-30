<?php

namespace AppBundle\Controller\Settings;

/**
 * Description of LieuController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Settings\Lieu;
use AppBundle\Form\Settings\LieuType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LieuController extends FOSRestController{
    
    public function getPlacesAction() {
        $em = $this->getDoctrine()->getManager();
        $lieux = $em->getRepository('AppBundle:Settings\Lieu')->findAll();
        return $lieux;
    }
    
    public function getPlaceAction($id) {
        $em = $this->getDoctrine()->getManager();
        $lieu = $em->getRepository('AppBundle:Settings\Lieu')->find($id);
        return $lieu;
    }
    
    public function postPlaceAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $lieu = new Lieu;
        $form = $this->createForm(LieuType::class, $lieu);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lieu);
            $em->flush();
            $response = $em->getRepository('AppBundle:Settings\Lieu')->findByTitle($lieu->getTitle());
            return $response;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putPlaceAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $lieu = $em->getRepository('AppBundle:Settings\Lieu')->find($id);
        $form = $this->createForm(LieuType::class, $lieu);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($lieu);
            $em->flush();
            return $lieu;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deletePlaceAction($id) {
        $em = $this->getDoctrine()->getManager();
        $lieu = $em->getRepository('AppBundle:Settings\Lieu')->find($id);
        $em->remove($lieu);
        $em->flush();
    }
}
