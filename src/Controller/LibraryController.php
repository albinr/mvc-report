<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LibraryController extends AbstractController
{
    #[Route('/library', name: 'library')]
    public function index(
        ManagerRegistry $doctrine
    ): Response {

        $entityManager = $doctrine->getManager();
        $books = $entityManager->getRepository(Book::class)->findAll();

        return $this->render('library/index.html.twig', [
            'books' => $books,
        ]);
    }

    #[Route('/library/create', name: 'create')]
    public function createFormBook(): Response
    {
        return $this->render('library/create.html.twig', [
            'controller_name' => 'LibraryController',
        ]);
    }

    #[Route('/library/create/book', name: 'create_book', methods: ['POST'])]
    public function createBook(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $book = new Book();
        $book->setTitle($request->request->get('title'));
        $book->setAuthor($request->request->get('author'));
        $book->setIsbn($request->request->get('isbn'));
        $book->setImage($request->request->get('image'));


        $entityManager->persist($book);
        $entityManager->flush();

        $this->addFlash('success', 'Saved new book with id ' . $book->getBookId());

        return $this->redirectToRoute('read_many');
    }

    #[Route('/library/book/{bookId}', name: 'read_one')]
    public function readOne(
        ManagerRegistry $doctrine,
        int $bookId
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookId);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $bookId);
        }

        return $this->render('library/read_one.html.twig', [
            'book' => $book,
        ]);
    }

    #[Route('/library/books', name: 'read_many')]
    public function readMany(
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();
        $books = $entityManager->getRepository(Book::class)->findAll();

        return $this->render('library/read_many.html.twig', [
            'books' => $books,
        ]);
    }


    #[Route('/library/book/edit/{bookId}', name: 'edit_book')]
    public function updateFormBook(ManagerRegistry $doctrine, int $bookId): Response
    {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookId);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $bookId);
        }

        return $this->render('library/update.html.twig', [
            'book' => $book,
        ]);
    }

    #[Route('/library/book/update/{bookId}', name: 'update_book', methods: ['POST'])]
    public function updateBook(
        Request $request,
        ManagerRegistry $doctrine,
        int $bookId
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookId);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $bookId);
        }

        $book->setTitle($request->request->get('title'));
        $book->setAuthor($request->request->get('author'));
        $book->setIsbn($request->request->get('isbn'));
        $book->setImage($request->request->get('image'));

        $entityManager->flush();

        $this->addFlash('success', 'Book updated successfully');

        return $this->redirectToRoute('read_one', ['id' => $book->getBookId()]);
    }

    #[Route('/library/book/delete/{bookId}', name: 'delete_book', methods: ['POST'])]
    public function deleteBook(
        ManagerRegistry $doctrine,
        int $bookId
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookId);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $bookId);
        }

        $entityManager->remove($book);
        $entityManager->flush();

        $this->addFlash('success', 'Book deleted successfully');

        return $this->redirectToRoute('read_many');
    }
}
