<?php

declare(strict_types=1);

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Dto\BookCollection;
use App\Repository\BookRepository;

final readonly class BookListProvider implements ProviderInterface
{
    public function __construct(
        private BookRepository $bookRepository,
    )
    {
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): BookCollection
    {
        return new BookCollection($this->bookRepository->findAll());
    }
}
