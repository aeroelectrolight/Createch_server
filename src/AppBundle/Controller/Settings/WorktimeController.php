<?php

namespace AppBundle\Controller\Settings;

/**
 * Description of WorktimeController
 *
 * @author ludo
 */
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Entity\Settings\Worktime;
use AppBundle\Form\Settings\WorktimeType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;

class WorktimeController extends FOSRestController{

    /**
     * @Get("/worktimes")
     * @return type
     */
    public function getWorktimesAction() {
        $em = $this->getDoctrine()->getManager();
        $worktimes = $em->getRepository('AppBundle:Settings\Worktime')->findAll();
        return $worktimes;
    }

    /**
     * @Get("/worktimes/{id}")
     * @param type $id
     * @return type
     */
    public function getWorktimeAction($id) {
        $em = $this->getDoctrine()->getManager();
        $worktime = $em->getRepository('AppBundle:Settings\Worktime')->find($id);
        return $worktime;
    }

    /**
     * @Get("/worktimes/date/{datein},{dateout}")
     * @param type $datein
     * @param type $dateout
     * @return type
     */
    public function getWorktimeDateAction($datein,$dateout) {
        $em = $this->getDoctrine()->getManager();
        $worktimes = $em->getRepository('AppBundle:Settings\Worktime')->findPeriodWorktime($datein,$dateout);
        return $worktimes;
    }

    public function postWorktimeAction(Request $request) {
        $data = json_decode($request->getContent(), true);
        $worktime = new Worktime;
        $form = $this->createForm(WorktimeType::class, $worktime);
        $form->submit($data);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /* test si date est inférieur à 7h00 ou si ce n'est pas la première de la journée */
            $startday = $em->getRepository('AppBundle:Settings\Worktime')->findStartWorktime();
            $now = new \DateTime();
            $daysevenhours = new \DateTime();
            date_time_set($daysevenhours,7,0,0);
            if ($now < $daysevenhours && $worktime->getDirection() == 'startday') {
                $worktime->setDirection('start');
            }
            if ($startday && $worktime->getDirection() == 'startday') {
                $worktime->setDirection('start');
            }
            $em->persist($worktime);
            $em->flush();
            $response = $em->getRepository('AppBundle:Settings\Worktime')->find($worktime->getId());
            return $response;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function putWorktimeAction(Request $request, $id) {
        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        $worktime = $em->getRepository('AppBundle:Settings\Worktime')->find($id);
        $form = $this->createForm(WorktimeType::class, $worktime);
        $form->submit($data);
        if ($form->isValid()) {
            $em->persist($worktime);
            $em->flush();
            return $worktime;
        } else {
            $errors = $this->get('form_serializer')->serializeFormErrors($form, true, true);
            $response = new Response;
            $response->setStatusCode(422);
            $response->setContent(json_encode($errors));
            return $response;
        }
    }
    
    public function deleteWorktimeAction($id) {
        $em = $this->getDoctrine()->getManager();
        $worktime = $em->getRepository('AppBundle:Settings\Worktime')->find($id);
        $em->remove($worktime);
        $em->flush();
        $response = new Response;
        $response->setStatusCode(200);
        return $response;
    }
}
