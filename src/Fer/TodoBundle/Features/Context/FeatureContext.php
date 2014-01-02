<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 02/01/14
 * Time: 10:12
 */

namespace Fer\TodoBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Sanpi\Behatch\Context\BehatchContext;
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Feature context.
 */
class FeatureContext extends MinkContext //MinkContext if you want to test web
    implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
        $this->useContext('behatch', new BehatchContext($parameters));
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * Returns the Doctrine repository manager for a given entity.
     *
     * @param string $entityName The name of the entity.
     *
     * @return Doctrine\ORM\EntityRepository
     */
    protected function getRepository($entityName)
    {
        return $this->getEntityManager()->getRepository($entityName);
    }

    /**
     * Returns the Doctrine entity manager.
     *
     * @return Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->kernel->getContainer()->get('doctrine')->getManager();
    }

    /**
     * @Given /^the task with id "([^"]*)" should be archivado "([^"]*)"$/
     */
    public function theTaskWithIdShouldBeArchivado($id, $isArchivado)
    {
        $task = $this->getRepository('FerTodoBundle:Task')->find($id);
        if ($isArchivado == "TRUE") {
            assertTrue($task->isArchived());
        } else {
            assertFalse($task->isArchived());
        }

    }
}