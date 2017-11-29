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
        $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
        if ($form->handleRequest($request)->isValid()) {
            // ...
        }
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
        $books = $this->getDoctrine()
            ->getRepository(Books::class)
            ->findAll();
        return $this->render('BookBookBundle:Book:index.html.twig', compact('books'));
    }

    /**
     * @Route("/book/{id}",
     *     name="single_view"
     * )
     * @param $id
     */
    public function viewSingleAction($id){
        $repository = $this->getDoctrine()->getRepository(Books::class);
        $product = $repository->find($id);
        return $this->render("BookBookBundle:Book:view.html.twig",compact("product"));
    }
}
