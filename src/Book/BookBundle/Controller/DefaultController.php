<?php

namespace Book\BookBundle\Controller;

use Book\BookBundle\DataFixtures\ORM\LoadBooks;
use Book\BookBundle\Entity\Users;
use function sha1;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        /*$task = new Users();
        $task->setName('Write a blog post');
        $task->setPassword(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        return $this->render('default/new.html.twig', array(
            'form' => $form->createView(),
        ));*/

        return $this->render('BookBookBundle:Default:index.html.twig');
    }
}
