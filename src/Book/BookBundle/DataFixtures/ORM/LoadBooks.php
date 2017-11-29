<?php
// src/Blog/BlogBundle/DataFixtures/ORM/LoadCategory.php
namespace Book\BookBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Book\BookBundle\Entity\Books;
use Faker;
use function rand;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
class LoadBooks extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $posts = [];
        for ($i=0;$i<20;$i++){
            $posts[$i] = new Books();

            $posts[$i]->setTitle($faker->sentence($nbWords = 2))
                ->setAuthor($faker->name )
                ->setResume($faker->text($maxNbChars = 5000))
                ->setReleaseDate($faker->dateTime($max = 'now', $timezone = date_default_timezone_get()))
                ->setAvailable(0)
                ->setCategory($faker->numberBetween($min = 1, $max = 5))
                ->setBorrower($faker->numberBetween($min = 1, $max = 35));
            $manager->persist($posts[$i]);
        }
        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
    }
}