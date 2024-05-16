<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


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

    #[Route('/library/book/{bookid}', name: 'read_one')]
    public function readOne(
        ManagerRegistry $doctrine,
        int $bookid
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookid);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $bookid);
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


    #[Route('/library/book/edit/{bookid}', name: 'edit_book')]
    public function updateFormBook(ManagerRegistry $doctrine, int $bookid): Response
    {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookid);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $bookid);
        }

        return $this->render('library/update.html.twig', [
            'book' => $book,
        ]);
    }

    #[Route('/library/book/update/{bookid}', name: 'update_book', methods: ['POST'])]
    public function updateBook(
        Request $request,
        ManagerRegistry $doctrine,
        int $bookid
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookid);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $bookid);
        }

        $book->setTitle($request->request->get('title'));
        $book->setAuthor($request->request->get('author'));
        $book->setIsbn($request->request->get('isbn'));
        $book->setImage($request->request->get('image'));

        $entityManager->flush();

        $this->addFlash('success', 'Book updated successfully');

        return $this->redirectToRoute('read_one', ['bookid' => $book->getBookId()]);
    }

    #[Route('/library/book/delete/{bookid}', name: 'delete_book', methods: ['POST'])]
    public function deleteBook(
        ManagerRegistry $doctrine,
        int $bookid
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Book::class)->find($bookid);

        if (!$book) {
            throw $this->createNotFoundException('No book found for id ' . $bookid);
        }

        $entityManager->remove($book);
        $entityManager->flush();

        $this->addFlash('success', 'Book deleted successfully');

        return $this->redirectToRoute('read_many');
    }

    #[Route("/api/library/books", name: "api_library")]
    public function apiLibrary(ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $bookRepository = $entityManager->getRepository(Book::class);
        $books = $bookRepository->findAll();

        $bookData = array_map(function ($book) {
            return [
                'id' => $book->getBookId(),
                'title' => $book->getTitle(),
                'author' => $book->getAuthor(),
                'isbn' => $book->getIsbn(),
                'image' => $book->getImage(),
            ];
        }, $books);

        return new JsonResponse(['books' => $bookData]);
    }

    #[Route("/api/library/book/{isbn}", name: "api_library_isbn")]
    public function apiBookIsbn(string $isbn, ManagerRegistry $doctrine): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $bookRepository = $entityManager->getRepository(Book::class);
        $book = $bookRepository->findOneBy(['isbn' => $isbn]);

        if (!$book) {
            return new JsonResponse(['error' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        $bookData = [
            'id' => $book->getBookId(),
            'title' => $book->getTitle(),
            'author' => $book->getAuthor(),
            'isbn' => $book->getIsbn(),
            'image' => $book->getImage(),
        ];

        return new JsonResponse($bookData);
    }
}
