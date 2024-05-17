<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiLibraryController extends AbstractController
{
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
