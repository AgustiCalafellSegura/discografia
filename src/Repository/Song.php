<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:30
 */

/**
 * Class Song
 * @Entity
 * @Table(name="song")
 */
class Song
{
    /**
     * @var integer
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /**
     * @var string
     * @Column(type="string")
     */
    private $name;

    /**
     * @var integer
     * @Column(type="integer")
     */
    private $duration;

    /**
     * @var integer
     * @Column(type="integer")
     */
    private $stars;

    /**
     * @var array
     * @ManyToOne(targetEntity="Album", inversedBy="songs")
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
     * @param int $id
     * @return Song
     */

    /**
     * @return array
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param array $album
     * @return Song
     */
    public function setAlbum($album)
    {
        $this->album = $album;
        return $this;
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
    public function setName($name)
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
    public function setDuration($duration)
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
    public function setStars($stars)
    {
        $this->stars = $stars;
        return $this;
    }


    /**
     * @return string
     */
    public function toString()
    {
        return 'Song: '.$this->getName().' '.$this->getDuration().' '.$this->getStars();
    }
}