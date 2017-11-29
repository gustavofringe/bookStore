<?php

namespace Book\BookBundle\Controller;

use Book\BookBundle\DataFixtures\ORM\LoadBooks;
use Book\BookBundle\Entity\Users;
use Book\BookBundle\Form\UsersType;
use function sha1;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/",
     *     name="book_index"
     * )
     */
    public function indexAction(Request $request)
    {
        $users = new Users();
        $form = $this->createForm(UsersType::class, $users);

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
        $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

        return $this->render('BookBookBundle:Default:index.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/book",
     *     name="view_book"
     * )
     */
    public function viewAction(){
        return new Response("lol");
}
}
