<?php

declare(strict_types=1);

namespace App\Dto;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\McpTool;
use App\Entity\Book as BookEntity;
use App\State\Provider\BookProvider;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[ApiResource(
    shortName: 'Book',
    stateOptions: new Options(entityClass: BookEntity::class),
    jsonStream: true,
    mcp: [
        'dto_list_books' => new McpTool(
            description: 'List Books',
            provider: BookProvider::class,
            structuredContent: false,
        ),
    ],
)]
#[Map(source: BookEntity::class)]
final class BookCollection
{
    public string $id;

//    #[Map(source: 'title')]
//    public string $name;
    public string $title;
}
