<?php

declare(strict_types=1);

namespace App\Dto;

use ApiPlatform\Doctrine\Orm\Filter\PartialSearchFilter;
use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\McpTool;
use ApiPlatform\Metadata\Parameters;
use ApiPlatform\Metadata\QueryParameter;
use App\Entity\Book as BookEntity;
use App\State\Provider\BookProvider;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[ApiResource(
    shortName: 'Book',
    stateOptions: new Options(entityClass: BookEntity::class),
    jsonStream: true,
    operations: [],
//    operations: [
//        new GetCollection(
//            uriTemplate: '/dto_books',
//            output: BookCollection::class,
//            parameters: [
//                'name' => new QueryParameter(
//                    property: 'title',
//                    filter: new PartialSearchFilter(),
//                ),
//            ],
//        ),
//    ],
    mcp: [
        'dto_search_books' => new McpTool(
            description: 'Search Books',
            provider: BookProvider::class,
            input: SearchBook::class,
            output: BookCollection::class,
            parameters: new Parameters([
                'name' => new QueryParameter(
                    key: 'name',
                    property: 'title',
                    filter: new PartialSearchFilter(),
                ),
            ]),
        ),
    ],
)]
#[Map(source: BookEntity::class)]
final class SearchBook
{
    public string $id;

    #[Map(source: 'title')]
    public string $name;

    public string $title;
}
