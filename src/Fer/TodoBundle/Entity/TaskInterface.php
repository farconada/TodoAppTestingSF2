<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 13/01/14
 * Time: 21:09
 */
namespace Fer\TodoBundle\Entity;


/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fer\TodoBundle\Entity\TaskRepository")
 */
interface TaskInterface
{
    /**
     * @param bool $status
     */
    public function setArchived($status);

    /**
     * @return bool
     */
    public function isArchived();

    /**
     * @return bool
     */
    public function isDone();

    /**
     * Get id
     *
     * @return integer
     */
    public function getId();

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Task
     */
    public function setDueDate($dueDate);

    /**
     * Get dueDate
     *
     * @return \DateTime
     */
    public function getDueDate();

    /**
     * Set name
     *
     * @param string $name
     * @return Task
     */
    public function setName($name);
}