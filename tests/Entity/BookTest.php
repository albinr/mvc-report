<?php

namespace App\Tests\Entity;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testGetSetTitle()
    {
        $book = new Book();
        $title = "Dune";
        $book->setTitle($title);
        $this->assertEquals($title, $book->getTitle());
    }

    public function testGetSetISBN()
    {
        $book = new Book();
        $isbn = "9780340960196";
        $book->setIsbn($isbn);
        $this->assertEquals($isbn, $book->getIsbn());
    }

    public function testGetSetAuthor()
    {
        $book = new Book();
        $author = "Frank Herbert";
        $book->setAuthor($author);
        $this->assertEquals($author, $book->getAuthor());
    }

    public function testGetSetImage()
    {
        $book = new Book();
        $image = "img/dune.jpeg";
        $book->setImage($image);
        $this->assertEquals($image, $book->getImage());
    }
}
