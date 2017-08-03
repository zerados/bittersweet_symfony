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
    public function __toString() {
        return "texst";
    }
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
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
     */
    public $user;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    public $title;
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    public $instructions;
    /**
     * @ORM\ManyToMany(targetEntity="Ingredient")
     * @ORM\JoinTable(
     *     name="recipe_ingredients",
     *     joinColumns={
     *          @ORM\JoinColumn(name="recipe_id", referencedColumnName="id", onDelete="CASCADE"),
     *     },
     *     inverseJoinColumns={
     *          @ORM\JoinColumn(name="ingredient_id", referencedColumnName="id")
     *     })
     */
    public $ingredients;

    /**
     * @param mixed $ingredients
     */
    public function addIngredients($ingredients)
    {
        $this->ingredients->add($ingredients);
    }


    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function __construct()
    {
        // your own logic
    }
}