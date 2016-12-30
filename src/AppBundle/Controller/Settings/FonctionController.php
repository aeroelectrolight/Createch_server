<?php
namespace AppBundle\Controller\Settings;

/**
 * Description of FonctionController
 *
 * @author ludo
 */
use AppBundle\Entity\Settings\Fonction;
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Form\Settings\FonctionType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FonctionController extends FOSRestController {
    
    public function  getFonctionsAction() {
        $em = $this->getDoctrine()->getManager();
        $fonctions = $em->getRepository('AppBundle:Settings\Fonction')->findAll();

        return ($fonctions);
    }
    
    public function  getFonctionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $fonction = $em->getRepository('AppBundle:Settings\Fonction')->find($id);

        return $fonction;
    }
    
    public function postFonctionAction(Request $request) {
        $data = json_decode($request->getContent(),true);
        $fonction = new Fonction;
        $form = $this->createForm(FonctionType::class, $fonction);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fonction);
            $em->flush();
            $response = $em->getRepository('AppBundle:Settings\Fonction')->findByTitle($fonction->getTitle());
            return ($response);
        } else {
            $errors =  $this->get('form_serializer')->serializeFormErrors($form,true,true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putFonctionAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $fonction = $em->getRepository('AppBundle:Settings\Fonction')->find($id);
        $form = $this->createForm(FonctionType::class, $fonction);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($fonction);
            $em->flush();
            return $fonction;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deleteFonctionAction($id) {
        $em = $this->getDoctrine()->getManager();
        $fonction = $em->getRepository("AppBundle:Settings\Fonction")->find($id);
        $em->remove($fonction);
        $em->flush();
    }
}
