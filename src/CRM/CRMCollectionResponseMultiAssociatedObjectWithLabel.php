<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-type crm_collection_response_multi_associated_object_with_label = array{
 *   results: list<CRMMultiAssociatedObjectWithLabel>, paging?: Paging
 * }
 */
final class CRMCollectionResponseMultiAssociatedObjectWithLabel implements BaseModel
{
    /** @use SdkModel<crm_collection_response_multi_associated_object_with_label> */
    use SdkModel;

    /** @var list<CRMMultiAssociatedObjectWithLabel> $results */
    #[Api(list: CRMMultiAssociatedObjectWithLabel::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CRMCollectionResponseMultiAssociatedObjectWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMCollectionResponseMultiAssociatedObjectWithLabel::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMCollectionResponseMultiAssociatedObjectWithLabel)->withResults(...)
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
     * @param list<CRMMultiAssociatedObjectWithLabel> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<CRMMultiAssociatedObjectWithLabel> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
