<?php

namespace Book\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Table(name="books")
 * @ORM\Entity(repositoryClass="Book\BookBundle\Repository\BooksRepository")
 */
class Books
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text")
     */
    private $resume;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="releaseDate", type="datetime")
     */
    private $releaseDate;

    /**
     * @var bool
     *
     * @ORM\Column(name="available", type="boolean")
     */
    private $available;

    /**
     * @var int
     * @ORM\Column(name="categoryId", type="integer")
     * @ORM\ManyToOne(targetEntity="Book\BookBundle\Entity\Categories", inversedBy="categories")
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $category;

    /**
     * @var int
     * @ORM\Column(name="borrowerId", type="integer")
     * @ORM\ManyToOne(targetEntity="Book\BookBundle\Entity\Borrowers", inversedBy="borrowers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $borrower;




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Books
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Books
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Books
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Books
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set available
     *
     * @param boolean $available
     *
     * @return Books
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get available
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set category
     *
     * @param \Book\BookBundle\Entity\Categories $category
     *
     * @return Books
     */
    public function setCategory($category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \Book\BookBundle\Entity\Categories
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set borrower
     *
     * @param \Book\BookBundle\Entity\Borrowers $borrower
     *
     * @return Books
     */
    public function setBorrower($borrower = null)
    {
        $this->borrower = $borrower;

        return $this;
    }

    /**
     * Get borrower
     *
     * @return \Book\BookBundle\Entity\Borrowers
     */
    public function getBorrower()
    {
        return $this->borrower;
    }
}
