<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Track
 *
 * @ORM\Table(name="tracks")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrackRepository")
 */
class Track
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="released_at", type="datetime")
     */
    private $releasedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=255)
     */
    private $genre;

  /**
   * @var Collection|Artist[]
   *
   * @ORM\ManyToMany(targetEntity="Artist", inversedBy="tracks")
   */
    private $artists;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Track
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set releasedAt
     *
     * @param \DateTime $releasedAt
     *
     * @return Track
     */
    public function setReleasedAt($releasedAt)
    {
        $this->releasedAt = $releasedAt;

        return $this;
    }

    /**
     * Get releasedAt
     *
     * @return \DateTime
     */
    public function getReleasedAt()
    {
        return $this->releasedAt;
    }

    /**
     * Set genre
     *
     * @param string $genre
     *
     * @return Track
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->artists = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add artist
     *
     * @param \AppBundle\Entity\Artist $artist
     *
     * @return Track
     */
    public function addArtist(\AppBundle\Entity\Artist $artist)
    {
        $this->artists[] = $artist;

        return $this;
    }

    /**
     * Remove artist
     *
     * @param \AppBundle\Entity\Artist $artist
     */
    public function removeArtist(\AppBundle\Entity\Artist $artist)
    {
        $this->artists->removeElement($artist);
    }

    /**
     * Get artists
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtists()
    {
        return $this->artists;
    }
}
