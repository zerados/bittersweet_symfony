<?php
/**
 * Created by PhpStorm.
 * User: zera
 * Date: 7/31/17
 * Time: 2:48 AM
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="recipe")
 */
class Recipe
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;
    /**
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;
    /**
     * Many Users have One Address.
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    protected $title;
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $instructions;


    public function getCreatedAt() : DateTime
    {
        return $this->createdAt;
    }
    public function getUpdatedAt() : DateTime
    {
        return $this->updatedAt;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}