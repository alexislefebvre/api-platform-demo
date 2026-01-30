<?php

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiResource;
use App\Entity\Book as BookEntity;
use App\Enum\BookCondition;
use Symfony\Component\ObjectMapper\Attribute\Map;

#[ApiResource(
    shortName: 'Book',
    stateOptions: new Options(entityClass: BookEntity::class),
    operations: [ ],

)]
#[Map(source: BookEntity::class)]
final class Book
{
    public int $id;

//    #[Map(source: 'title')]
//    public string $name;

    public ?string $author;

    public BookCondition $condition;

    public ?int $rating;
}
