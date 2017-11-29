<?php
/**
 * Created by PhpStorm.
 * User: gustavo
 * Date: 29/11/17
 * Time: 10:11
 */

namespace Book\BookBundle\DataFixtures\ORM;
use Book\BookBundle\Entity\Borrowers;
use Book\BookBundle\Entity\Categories;
use Book\BookBundle\Entity\Users;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Book\BookBundle\Entity\Books;
use Faker;
use function rand;
use stdClass;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadUsers extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface, FixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $tab = [
            [
                'name'=>'robert',
                'password'=>'12e9293ec6b30c7fa8a0926af42807e929c1684f'
            ],
        [
                'name'=>'maxime',
                'password'=>'1acc295174379ec718e1123290d06dcd8d68feb6'
        ],
            [
                'name'=>'odette',
                'password'=>'329ef167fcd2befe9df782ccd8d6ea35b8338fd4'
            ]
        ];
        foreach ($tab as $i){
            $users = new Users();
            $users->setName($i['name']);
            $users->setPassword($i['password']);
            $manager->persist($users);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
    }

}