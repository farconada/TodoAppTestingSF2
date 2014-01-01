<?php

namespace Fer\TodoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fer\TodoBundle\Entity\TaskRepository")
 */
class Task
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isDone", type="boolean")
     */
    private $done;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isArchived", type="boolean")
     */
    private $archived;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="datetime", nullable=TRUE)
     */
    private $dueDate;

    public function __construct($name) {
        $this->name = $name;
        $this->archived = FALSE;
        $this->done = FALSE;
        $this->dueDate = null;
    }

    /**
     * @return bool
     */
    public function isDone() {
        return $this->done;
    }

    /**
     * @return bool
     */
    public function isArchived() {
        return $this->archived;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Task
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime 
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }
}
