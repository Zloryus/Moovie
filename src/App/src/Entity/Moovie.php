<?php
/**
 * Created by PhpStorm.
 * User: eric_b
 * Date: 06/07/2017
 * Time: 11:10
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="moovie_mov")
 */
class Moovie implements \JsonSerializable {
    /**
     * @ORM\Id
     * @ORM\Column(name="id_mov", type="bigint")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="name_mov", type="string", length=255 )
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="date_mov", type="date")
     * @var string
     */
    private $date;

    /**
     * @ORM\Column(name="description_mov", type="text")
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(name="review_mov", type="text")
     * @var string
     */
    private $review;

    /**
     * Application constructor.
     * @param $name
     */
    public function __construct($name,$date,$description,$review){
        $this->name = $name;
        $this->date = $date;
        $this->description = $description;
        $this->review = $review;
    }

   /****************************************************************************************
    ********************************** GETTERS / SETTERS************************************
    ****************************************************************************************/

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDate(){
        return $this->date;
    }

    public function getDateString(){
        return $this->date->format('d/m/Y');
    }

    public function getDescription(){
        return $this->description;
    }

    public function getDescriptionTruncate(){
        return substr($this->description,0,255).'.....';
    }

    public function getReview(){
        return $this->review;
    }

   /**
     * Serial function
     */
    public function jsonSerialize(){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date' => $this->date,
            'dateString' => $this->date->format('d/m/Y'),
            'description' => $this->description,
            'description_short' => substr($this->description,0,255).'.....',
            'review' => $this->review
        ];
    }
}