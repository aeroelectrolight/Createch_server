<?php
namespace UserBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * UsersController
 */
class UsersController extends Controller
{
  public function getUsersAction()
  {
    $em = $this->getDoctrine()->getManager();
    $users = $em->getRepository('UserBundle:User')->findAll();

    return array('users' => $users);
  }
}
