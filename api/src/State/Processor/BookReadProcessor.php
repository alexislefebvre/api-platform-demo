<?php

declare(strict_types=1);

namespace App\State\Processor;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Book;
use App\Repository\BookRepository;
use Mcp\Schema\Result\CallToolResult;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @implements ProcessorInterface<Book, Book>
 */
final readonly class BookReadProcessor implements ProcessorInterface
{
    public function __construct(
        private BookRepository $bookRepository,
    )
    {
    }

    /**
     * @param Book $data
     */
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): iterable|Book|CallToolResult|null
    {
        $books = $this->bookRepository->findAll();

        $content = [];
        foreach ($books as $book) {
            $content[] = ['type' => 'text', 'text' => $book->getId().' '.$book->title.' '.$book->author];
        }

        return CallToolResult::fromArray([
            'content' => $content,
            'structuredContent' => $books,
        ]);
    }
}
