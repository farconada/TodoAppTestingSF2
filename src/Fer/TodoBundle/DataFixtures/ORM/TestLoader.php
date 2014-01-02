<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 9/10/13
 * Time: 13:58
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\TodoBundle\DataFixtures;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fer\TodoBundle\Entity\Task;

class TestLoader implements  FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i<20; $i++) {
            $task = new Task($faker->sentence(10));
            $manager->persist($task);
        }
        $manager->flush();
    }
}