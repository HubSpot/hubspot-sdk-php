<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\RandomAccessCollectionResponseWithTotalHubDBTableRowV3\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BoundedPagingShape from \HubspotSDK\Cms\Hubdb\BoundedPaging
 *
 * @phpstan-type RandomAccessCollectionResponseWithTotalHubDBTableRowV3Shape = array{
 *   results: list<mixed>,
 *   total: int,
 *   type: Type|value-of<Type>,
 *   paging?: null|BoundedPaging|BoundedPagingShape,
 * }
 */
final class RandomAccessCollectionResponseWithTotalHubDBTableRowV3 implements BaseModel
{
    /** @use SdkModel<RandomAccessCollectionResponseWithTotalHubDBTableRowV3Shape> */
    use SdkModel;

    /** @var list<mixed> $results */
    #[Required(list: 'mixed')]
    public array $results;

    #[Required]
    public int $total;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?BoundedPaging $paging;

    /**
     * `new RandomAccessCollectionResponseWithTotalHubDBTableRowV3()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RandomAccessCollectionResponseWithTotalHubDBTableRowV3::with(
     *   results: ..., total: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RandomAccessCollectionResponseWithTotalHubDBTableRowV3)
     *   ->withResults(...)
     *   ->withTotal(...)
     *   ->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed> $results
     * @param Type|value-of<Type> $type
     * @param BoundedPagingShape $paging
     */
    public static function with(
        array $results,
        int $total,
        Type|string $type = 'RANDOM_ACCESS',
        BoundedPaging|array|null $paging = null,
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;
        $self['type'] = $type;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<mixed> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param BoundedPagingShape $paging
     */
    public function withPaging(BoundedPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
