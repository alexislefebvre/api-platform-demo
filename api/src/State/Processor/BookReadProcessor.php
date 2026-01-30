<?php

declare(strict_types=1);

namespace App\State\Processor;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Book;
use App\Repository\BookRepository;

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
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): iterable|Book|null
    {
        return $this->bookRepository->findAll()[0];
    }
}
