<?php
namespace AppBundle\Controller\Settings;

/**
 * Description of ConventionController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Settings\Convention;
use AppBundle\Form\Settings\ConventionType;
use Symfony\Component\HttpFoundation\Response;

class ConventionController extends FOSRestController{
    
    public function getConventionsAction() {
        $em = $this->getDoctrine()->getManager();
        $conventions = $em->getRepository('AppBundle:Settings\Convention')->findAll();
        return $conventions;
    }
    
    public function getConventionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $convention = $em->getRepository('AppBundle:Settings\Convention')->find($id);
        return $convention;
    }
    
    public function postConventionAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $convention = new Convention;
        $form = $this->createForm(ConventionType::class, $convention);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($convention);
            $em->flush();
            $response = $em->getRepository('AppBundle:Settings\Convention')->findByTitle($convention->getTitle());
            return $response;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putConventionAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $convention = $em->getRepository('AppBundle:Settings\Convention')->find($id);
        $form = $this->createForm(ConventionType::class, $convention);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($convention);
            $em->flush();
            return $convention;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deleteConventionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $convention = $em->getRepository('AppBundle:Settings\Convention')->find($id);
        $em->remove($convention);
        $em->flush();
    }
}
