<?php

namespace Book\BookBundle\Controller;

use Book\BookBundle\DataFixtures\ORM\LoadBooks;
use Book\BookBundle\Entity\Books;
use Book\BookBundle\Entity\Users;
use Book\BookBundle\Form\UsersType;
use function sha1;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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
        /*if ($form->handleRequest($request)->isValid()) {
            $request->getSession()->getFlashBag()->add('success', 'Vous êtes maintenant connecté');
            dump($request->request->all());
            //return $this->redirectToRoute('view_books');
        }*/
        $users = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findAll();
        foreach($users as $user) {
            if ($request->isMethod('POST')) {
                if ($user->getName() === $request->request->get('book_bookbundle_users')['name']) {
                    if ($user->getPassword() === $request->request->get('book_bookbundle_users')['password']) {
                        if ($form->isSubmitted() && $form->isValid()) {
                            // perform some action...

                            return $this->redirectToRoute('view_books');
                        }
                    }else{
                        echo 'pass ';
                    }
                }else{
                    echo 'name';
                }
            }
        }

        $form = $form->createView();
        return $this->render('BookBookBundle:Default:index.html.twig',compact('form'));
    }

    /**
     * @Route(
     *     path = "/books/",
     *     name = "view_books"
     * )
     */
    public function viewAction(){

        $books = $this->getDoctrine()
            ->getRepository(Books::class)
            ->findAll();
        return $this->render('BookBookBundle:Book:index.html.twig', compact('books'));
    }

    /**
     * @Route(
     *     path = "/book/{id}",
     *     name="single_view",
     *     requirements = {"id": "\d+"}
     * )
     * @param $id
     */
    public function viewSingleAction($id){
        $repository = $this->getDoctrine()->getRepository(Books::class);
        $product = $repository->find($id);
        return $this->render("BookBookBundle:Book:view.html.twig",compact("product"));
    }
    public function newAction(){

    }
}
