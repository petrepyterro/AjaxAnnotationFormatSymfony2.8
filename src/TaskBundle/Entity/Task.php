<?php

namespace TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Length;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="TaskBundle\Repository\TaskRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Task
{
  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @Assert\NotBlank(message="Task field is required.")
   * @ORM\Column(name="task", type="string", length=255)
   */
  private $task;

  /**
   * @var bool
   *
   * @ORM\Column(name="complete", type="boolean", nullable=true)
   */
  private $complete;

  /**
   * @var \DateTime
   *
   * @ORM\Column(name="created", type="datetime")
   */
  private $created;


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
   * Set task
   *
   * @param string $task
   * @return Task
   */
  public function setTask($task)
  {
    $this->task = $task;

    return $this;
  }

  /**
   * Get task
   *
   * @return string 
   */
  public function getTask()
  {
    return $this->task;
  }

  /**
   * Set complete
   *
   * @param boolean $complete
   * @return Task
   */
  public function setComplete($complete)
  {
    $this->complete = $complete;

    return $this;
  }

  /**
   * Get complete
   *
   * @return boolean 
   */
  public function getComplete()
  {
    return $this->complete;
  }

  /**
   * Set created
   *
   * @param \DateTime $created
   * @return Task
   * @ORM\PrePersist
   */
  public function setCreated()
  {
    $this->created = new \DateTime();

    return $this;
  }

  /**
   * Get created
   *
   * @return \DateTime 
   */
  public function getCreated()
  {
    return $this->created;
  }
}
