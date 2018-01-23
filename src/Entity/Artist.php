<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:29
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Artist
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ArtistRepository")
 * @ORM\Table(name="Artists")
 */
class Artist
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
     * @var array
     * @ORM\OneToMany(targetEntity="Album", mappedBy="artist", cascade={"persist"})
     */
    private $albums;

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
     * @return Artist
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * @param array $albums
     * @return Artist
     */
    public function setAlbums($albums)
    {
        $this->albums = $albums;
        return $this;
    }

    /**
     * @param Album $album
     * @return $this
     */
    public function addAlbum($album)
    {
        $this->albums[] = $album;
        $album->setArtist($this);
        return $this;
    }

    /**
     * @param $album
     */
    public function removeAlbum($album){
        $this->albums = array_diff($album);
    }

    /**
     * @return string
     */
    public function toString()
    {
        return 'Artist: '.$this->getName().' ID: '.$this->getId();
    }
}