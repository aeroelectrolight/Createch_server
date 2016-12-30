<?php

namespace AppBundle\Controller\Maintenances;

/**
 * Description of VerificationController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Maintenances\Verifications;
use AppBundle\Form\Maintenances\VerificationsType;
use Symfony\Component\HttpFoundation\Response;

class VerificationsController extends FOSRestController{
    
    public function getVerificationsAction() {
        $em = $this->getDoctrine()->getManager();
        $verifications = $em->getRepository('AppBundle:Maintenances\Verifications')->findAll();
        return $verifications;
    }
    
    public function getVerificationAction($id) {
        $em = $this->getDoctrine()->getManager();
        $verifications = $em->getRepository('AppBundle:Maintenances\Verifications')->find($id);
        return $verifications;
    }
    
    public function postVerificationAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $verification = new Verifications;
        $form = $this->createForm(VerificationsType::class, $verification);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($verification);
            $em->flush();
            $response = $em->getRepository('AppBundle:Maintenances\Verifications')->find($verification->getId());
            return $response;
        } else {
            $errors =  $this->get('form_serializer')->serializeFormErrors($form,true,true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putVerificationAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $verification = $em->getRepository('AppBundle:Maintenances\Verifications')->find($id);
        $form = $this->createForm(VerificationsType::class, $verification);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($verification);
            $em->flush();
            return $verification;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deleteVerificationAction($id) {
        $em = $this->getDoctrine()->getManager();
        $verification = $em->getRepository("AppBundle:Maintenances\Verifications")->find($id);
        $em->remove($verification);
        $em->flush();
    }
}
