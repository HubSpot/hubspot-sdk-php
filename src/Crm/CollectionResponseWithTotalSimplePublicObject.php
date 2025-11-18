<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-type CollectionResponseWithTotalSimplePublicObjectShape = array{
 *   results: list<SimplePublicObject>, total: int, paging?: Paging|null
 * }
 */
final class CollectionResponseWithTotalSimplePublicObject implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalSimplePublicObjectShape> */
    use SdkModel;

    /** @var list<SimplePublicObject> $results */
    #[Api(list: SimplePublicObject::class)]
    public array $results;

    /**
     * The total number of objects in the collection.
     */
    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalSimplePublicObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalSimplePublicObject::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalSimplePublicObject)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<SimplePublicObject> $results
     */
    public static function with(
        array $results,
        int $total,
        ?Paging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<SimplePublicObject> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * The total number of objects in the collection.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
