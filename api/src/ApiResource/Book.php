<?php

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\McpTool;
use App\Entity\Book as BookEntity;
use App\State\Provider\BookProvider;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[ApiResource(
    shortName: 'Book',
    stateOptions: new Options(entityClass: BookEntity::class),
    operations: [ ],
//    mcp: [
//        'list_books' => new McpTool(
//            name: 'List Books',
//            provider: BookProvider::class,
//        ),
//        'search_books' => new McpTool(
//            name: 'Search Books',
//            // TODO: create input DTO
//            provider: BookProvider::class,
//        ),
//    ],
)]
#[Map(source: BookEntity::class)]
final class Book
{
    public int $id;

    #[Map(source: 'title')]
    public string $name;

    public string $description;

    public string $isbn;
}
