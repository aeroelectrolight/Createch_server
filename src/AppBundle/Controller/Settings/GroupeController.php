<?php

namespace AppBundle\Controller\Settings;

/**
 * Description of GroupeController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Settings\Groupe;
use AppBundle\Form\Settings\GroupeType;
use Symfony\Component\HttpFoundation\Response;

class GroupeController extends FOSRestController{
    public function getGroupesAction() {
        $em = $this->getDoctrine()->getManager();
        $groupes = $em->getRepository('AppBundle:Settings\Groupe')->findAll();
        return $groupes;
    }
    public function getGroupeAction($id) {
        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('AppBundle:Settings\Groupe')->find($id);
        return $groupe;
    }
    public function postGroupeAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $groupe = new Groupe;
        $form = $this->createForm(GroupeType::class, $groupe);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();
            $response = $em->getRepository('AppBundle:Settings\Groupe')->findByTitle($groupe->getTitle());
            return $response;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    public function putGroupeAction(Request $request, $id) {
        $data = json_decode($request->getContent(),true);
        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('AppBundle:Settings\Groupe')->find($id);
        $form = $this->createForm(GroupeType::class, $groupe);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush();
            return $groupe;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    public function deleteGroupeAction($id) {
        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('AppBundle:Settings\Groupe')->find($id);
        $em->remove($groupe);
        $em->flush();
    }
}
