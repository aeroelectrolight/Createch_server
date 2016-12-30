<?php

namespace AppBundle\Controller\Settings;

/**
 * Description of InformationsController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Settings\Informations;
use AppBundle\Form\Settings\InformationsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InformationsController extends FOSRestController{
    
    public function getInformationsAction() {
        $em = $this->getDoctrine()->getManager();
        $Informations = $em->getRepository('AppBundle:Settings\Informations')->findAll();
        return $Informations;
    }
    
    public function getInformationAction($id) {
        $em = $this->getDoctrine()->getManager();
        $information = $em->getRepository('AppBundle:Settings\Informations')->find($id);
        return $information;
    }
    
    public function postInformationAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $information = new Informations;
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
    
    public function putInformationAction(Request $request, $id) {
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
    
    public function deleteInformationAction($id) {
        $em = $this->getDoctrine()->getManager();
        $lieu = $em->getRepository('AppBundle:Settings\Lieu')->find($id);
        $em->remove($lieu);
        $em->flush();
    }
}
