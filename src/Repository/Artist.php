<?php
/**
 * Created by PhpStorm.
 * User: agusti
 * Date: 9/01/18
 * Time: 16:29
 */

/**
 * Class Artist
 * @Entity
 * @Table(name="artist")
 */
class Artist
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
     * @var array
     * @OneToMany(targetEntity="Album", mappedBy="artist", cascade={"persist"})
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

    public function printArtist(Output $output)
    {
        /** @var Album $album */
        foreach ($this->albums as $album)
        {
            $output->writeln($album->toString());
            $album->printSongs($output);
        }
    }
}