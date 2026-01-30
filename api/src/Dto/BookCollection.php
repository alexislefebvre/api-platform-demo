<?php

declare(strict_types=1);

namespace App\Dto;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\McpTool;
use App\State\BookListProvider;

#[ApiResource(
    shortName: 'Book',
    jsonStream: true,
    operations: [],
    mcp: [
        'dto_list_books' => new McpTool(
            description: 'List Books',
            provider: BookListProvider::class,
            // this break `context['output']['gen_id'] = $propertyMetadata->getGenId() ?? true;` in `OperationContextTrait.php`
//            output: BookCollection::class,
            structuredContent: true,
        ),
    ],
)]
final class BookCollection {
    /** @var array<int, object> */
    public function __construct(array $members) {
        $this->members = $members;
    }

    /** @var array<int, object> */
    public array $members = [];
}
