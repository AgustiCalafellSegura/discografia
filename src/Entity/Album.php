<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:25
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Album
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 * @ORM\Table(name="Albums")
 */
class Album
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var Artist
     * @ORM\ManyToOne(targetEntity="Artist", inversedBy="albums")
     * @ORM\JoinColumn(name="artist_id", referencedColumnName="id")
     */
    private $artist;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $genere;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @var array
     * @ORM\OneToMany(targetEntity="Song", mappedBy ="album", cascade={"persist"})
     */
    private $songs;

    public function __construct()
    {
        $this->songs = array();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param Artist $artist
     * @return Album
     */
    public function setArtist(Artist $artist)
    {
        $this->artist = $artist;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Album
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getGenere()
    {
        return $this->genere;
    }

    /**
     * @param string $genere
     * @return Album
     */
    public function setGenere(string $genere)
    {
        $this->genere = $genere;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return Album
     */
    public function setYear(int $year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return array
     */
    public function getSongs()
    {
        return $this->songs;
    }

    /**
     * @param array $songs
     * @return Album
     */
    public function setSongs(array $songs)
    {
        $this->songs = $songs;
        return $this;
    }



    /**
     * @param Song $song
     * @return $this
     */
    public function addSong($song)
    {
        $this->songs[] = $song;
        $song->setAlbum($this);
        return $this;
    }

    /**
     * @param $song
     */
    public function removeSong($song)
    {
        foreach ($this->songs as $itemSong)
        {
            if($itemSong->getName()){
                $this->songs = array_diff($song);
            }
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }
}