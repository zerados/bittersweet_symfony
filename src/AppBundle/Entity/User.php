<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    public $bio;
    /**
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     * 
     */
    private $created_at;

    /**
     * One User has Many recipes.
     * @ORM\OneToMany(targetEntity="Recipe", mappedBy="user" )
     *
     */
    private $recipes;

    /**
     * @return mixed
     */
    public function getrecipes()
    {
        return $this->recipes;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}