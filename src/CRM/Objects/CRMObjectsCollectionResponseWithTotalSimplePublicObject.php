<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-type crm_objects_collection_response_with_total_simple_public_object = array{
 *   results: list<CRMObjectsSimplePublicObject>, total: int, paging?: Paging
 * }
 */
final class CRMObjectsCollectionResponseWithTotalSimplePublicObject implements BaseModel
{
    /**
     * @use SdkModel<crm_objects_collection_response_with_total_simple_public_object>
     */
    use SdkModel;

    /** @var list<CRMObjectsSimplePublicObject> $results */
    #[Api(list: CRMObjectsSimplePublicObject::class)]
    public array $results;

    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CRMObjectsCollectionResponseWithTotalSimplePublicObject()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsCollectionResponseWithTotalSimplePublicObject::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsCollectionResponseWithTotalSimplePublicObject)
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
     * @param list<CRMObjectsSimplePublicObject> $results
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
     * @param list<CRMObjectsSimplePublicObject> $results
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

    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
