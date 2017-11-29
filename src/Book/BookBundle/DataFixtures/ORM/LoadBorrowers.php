<?php
/**
 * Created by PhpStorm.
 * User: gustavo
 * Date: 29/11/17
 * Time: 10:07
 */

namespace Book\BookBundle\DataFixtures\ORM;
use Book\BookBundle\Entity\Borrowers;
use Book\BookBundle\Entity\Categories;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Book\BookBundle\Entity\Books;
use Faker;
use function rand;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadBorrowers extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface, FixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $borrowers = [];
        for($i=0;$i<35;$i++){
            $borrowers[$i] = new Borrowers();
            $borrowers[$i]->setName($faker->lastName)
                ->setMemberId($faker->ean8);;
            $manager->persist($borrowers[$i]);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
    }
}