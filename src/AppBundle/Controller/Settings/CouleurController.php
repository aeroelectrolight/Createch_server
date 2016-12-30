<?php
namespace AppBundle\Controller\Settings;

/**
 * Description of couleurController
 *
 * @author ludo
 */
use AppBundle\Entity\Settings\Couleur;
use AppBundle\Form\Settings\CouleurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\View\ViewHandler;

class CouleurController extends FOSRestController {
    /*
     * @return array
     */
    public function getCouleursAction() {
        $em = $this->getDoctrine()->getManager();
        $couleurs = $em->getRepository('AppBundle:Settings\Couleur')->findAll();
        
        return ($couleurs);
    }
    
    public function getCouleurAction($id) {
        $em = $this->getDoctrine()->getManager();
        $couleur = $em->getRepository('AppBundle:Settings\Couleur')->find($id);
        
        return ($couleur);
    }
    
    public function  postCouleurAction(Request $request) {
        
        $data = json_decode($request->getContent(), true);
        
        $couleur = new Couleur();
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->submit($data);
        //$errors = $this->get('validator')->validate($form);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($couleur);
            $em->flush();
            $response = $em->getRepository('AppBundle:Settings\Couleur')->findByTitle($couleur->getTitle());
            return $response;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putCouleurAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $couleur = $em->getRepository('AppBundle:Settings\Couleur')->find($id);
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->submit($data);
        if ($form->isValid()){
            $em->persist($couleur);
            $em->flush();
            return $couleur;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deleteCouleurAction($id) {
        $em = $this->getDoctrine()->getManager();
        $couleur = $em->getRepository('AppBundle:Settings\Couleur')->find($id);
        $em->remove($couleur);
        $em->flush();
    }
}
