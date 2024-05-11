<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Represents a book in the library.
 */
#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    /**
     * The unique id for the book.
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $bookid;

    /**
     * The title of the book.
     */
    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    /**
     * The isbn of the book.
     */
    #[ORM\Column(type: 'string', length: 20)]
    private string $isbn;

    /**
     * The author of the book.
     */
    #[ORM\Column(type: 'string', length: 255)]
    private string  $author;

    /**
     * The image of the book.
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private string $image;


    /**
     * Get the books unique id.
     *
     * @return int The books unique id.
     */
    public function getBookId(): int
    {
        return $this->bookid;
    }

    /**
     * Get the title of the book.
     *
     * @return string The title of the book.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the title of the book.
     *
     * @param string $title The new title of the book.
     * @return self Returns instance of the Book class.
     */
    public function setTitle(string $tile): self
    {
        $this->title = $tile;

        return $this;
    }

    /**
     * Get the isbn of the book.
     *
     * @return string The isbn of the book.
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * Set the isbn of the book.
     *
     * @param string|null $isbn The new isbn of the book.
     * @return self Returns instance of the Book class.
     */
    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the author of the book.
     *
     * @return string The author of the book.
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Set the author of the book.
     *
     * @param string $author The new author of the book.
     * @return self Returns instance of the Book class.
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the image path for the book cover.
     *
     * @return string|null The image path for the book cover.
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the image path for the book cover.
     *
     * @param string|null $image The new image path.
     * @return self Returns instance of the Book class.
     */
    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
