<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=false)
     * @Assert\NotBlank(message="Have you forgot to enter your name ?")
     */
	private $name;
	
	/**
     * @var string
     *
     * @ORM\Column(type="string", unique=false)
     * @Assert\NotBlank(message="Have you forgot to enter your email ?")
     * @Assert\Email()
     */
	private $email;
	
	/**
     * @var string
     *
     * @ORM\Column(type="string", unique=false)
     * @Assert\NotBlank(message="Have you forgot to enter your message ?")
     */
	private $content;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }
}
