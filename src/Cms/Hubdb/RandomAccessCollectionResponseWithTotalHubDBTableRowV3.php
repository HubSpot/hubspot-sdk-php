<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\RandomAccessCollectionResponseWithTotalHubDBTableRowV3\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RandomAccessCollectionResponseWithTotalHubDBTableRowV3Shape = array{
 *   results: list<mixed>,
 *   total: int,
 *   type: value-of<Type>,
 *   paging?: BoundedPaging|null,
 * }
 */
final class RandomAccessCollectionResponseWithTotalHubDBTableRowV3 implements BaseModel
{
    /** @use SdkModel<RandomAccessCollectionResponseWithTotalHubDBTableRowV3Shape> */
    use SdkModel;

    /** @var list<mixed> $results */
    #[Api(list: 'mixed')]
    public array $results;

    #[Api]
    public int $total;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
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
     */
    public static function with(
        array $results,
        int $total,
        Type|string $type = 'RANDOM_ACCESS',
        ?BoundedPaging $paging = null,
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;
        $obj['type'] = $type;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<mixed> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withPaging(BoundedPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
