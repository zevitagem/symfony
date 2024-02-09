<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    
    #[Route('/start/{name?}', name: 'start')]
    public function start($name = 'default'): Response
    {
        $em = $this->getDoctrine()->getManager();
        
//        $object = new \App\Entity\User();
//        $object->setTitle('jose');
//        $object->setAge(29);
//        
//        $em->persist($object);
//        $em->flush();
        
        $object = $em->getRepository(\App\Entity\User::class)->findOneBy([
            'age' => 29
        ]);

        return $this->render('user/index.html.twig', [
            'user' => $object,
        ]);
    }
}
