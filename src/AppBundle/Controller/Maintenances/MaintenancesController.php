<?php

namespace AppBundle\Controller\Maintenances;

/**
 * Description of MaintenancesController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Maintenances\Maintenances;
use AppBundle\Form\Maintenances\MaintenancesType;
use Symfony\Component\HttpFoundation\Response;

class MaintenancesController extends FOSRestController{
    
    public function getMaintenancesAction() {
        $em = $this->getDoctrine()->getManager();
        $maintenances = $em->getRepository('AppBundle:Maintenances\Maintenances')->findAll();
        return $maintenances;
    }
    
    public function getMaintenanceAction($id) {
        $em = $this->getDoctrine()->getManager();
        $maintenance = $em->getRepository('AppBundle:Maintenances\Maintenances')->find($id);
        return $maintenance;
    }
    
    public function postMaintenanceAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $maintenance = new Maintenances;
        $form = $this->createForm(MaintenancesType::class, $maintenance);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($maintenance);
            $em->flush();
            $response = $em->getRepository('AppBundle:Maintenances\Maintenances')->find($maintenance->getId());
            return $response;
        } else {
            $errors =  $this->get('form_serializer')->serializeFormErrors($form,true,true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putMaintenanceAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $maintenance = $em->getRepository('AppBundle:Maintenances\Maintenances')->find($id);
        $form = $this->createForm(MaintenancesType::class, $maintenance);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($maintenance);
            $em->flush();
            return $maintenance;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deleteMaintenanceAction($id) {
        $em = $this->getDoctrine()->getManager();
        $maintenance = $em->getRepository("AppBundle:Maintenances\Maintenances")->find($id);
        $em->remove($maintenance);
        $em->flush();
    }
}
