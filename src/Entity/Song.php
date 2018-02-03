<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:30
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Song
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\SongRepository")
 * @ORM\Table(name="Songs")
 */
class Song
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var integer
     * @ORM\Column(type="string")
     */
    private $duration;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $stars;

    /**
     * @var Album
     * @ORM\ManyToOne(targetEntity="Album", inversedBy="songs")
     */
    private $album;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Song
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     * @return Song
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return int
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     * @return Song
     */
    public function setStars(int $stars)
    {
        $this->stars = $stars;
        return $this;
    }

    /**
     * @return Album
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param Album $album
     * @return Song
     */
    public function setAlbum(Album $album)
    {
        $this->album = $album;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}