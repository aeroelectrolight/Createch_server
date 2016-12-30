<?php

namespace AppBundle\Controller\Events;

/**
 * Description of EventsController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Events\Budgets;
use AppBundle\Form\Events\BudgetsType;
use Symfony\Component\HttpFoundation\Response;

class BudgetsController extends FOSRestController{

    public function getBudgetsAction() {
        $em = $this->getDoctrine()->getManager();
        $budgets = $em->getRepository('AppBundle:Events\Budgets')->findAll();
        return $budgets;
    }

    public function getBudgetAction($id) {
        $em = $this->getDoctrine()->getManager();
        $budget = $em->getRepository('AppBundle:Events\Budgets')->find($id);
        return $budget;
    }

    public function postBudgetAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $budget = new Budgets;
        $form = $this->createForm(BudgetsType::class, $budget);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($budget);
            $em->flush();
            $response = $em->getRepository('AppBundle:Events\Budgets')->find($budget->getId());
            return $response;
        } else {
            $errors =  $this->get('form_serializer')->serializeFormErrors($form,true,true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putBudgetAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $budget = $em->getRepository('AppBundle:Events\Budgets')->find($id);
        $form = $this->createForm(BudgetsType::class, $budget);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($budget);
            $em->flush();
            return $budget;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deleteBudgetAction($id) {
        $em = $this->getDoctrine()->getManager();
        $budget = $em->getRepository("AppBundle:Events\Budgets")->find($id);
        $em->remove($budget);
        $em->flush();
    }
}
