<?php
/**
 * Created by PhpStorm.
 * User: gustavo
 * Date: 29/11/17
 * Time: 09:32
 */

namespace Book\BookBundle\DataFixtures\ORM;
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

class LoadCategories extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface, FixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $categories = [];
        for($i=0;$i<5;$i++){
            $categories[$i] = new Categories();
            $categories[$i]->setName($faker->domainWord);
            $manager->persist($categories[$i]);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
    }

}