<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\MarketingEmailsPaging;

/**
 * @phpstan-type crm_objects_collection_response_simple_public_object_with_associations = array{
 *   results: list<CRMObjectsSimplePublicObjectWithAssociations>,
 *   paging?: MarketingEmailsPaging,
 * }
 */
final class CRMObjectsCollectionResponseSimplePublicObjectWithAssociations implements BaseModel
{
    /**
     * @use SdkModel<crm_objects_collection_response_simple_public_object_with_associations>
     */
    use SdkModel;

    /** @var list<CRMObjectsSimplePublicObjectWithAssociations> $results */
    #[Api(list: CRMObjectsSimplePublicObjectWithAssociations::class)]
    public array $results;

    #[Api(optional: true)]
    public ?MarketingEmailsPaging $paging;

    /**
     * `new CRMObjectsCollectionResponseSimplePublicObjectWithAssociations()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMObjectsCollectionResponseSimplePublicObjectWithAssociations::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMObjectsCollectionResponseSimplePublicObjectWithAssociations)
     *   ->withResults(...)
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
     * @param list<CRMObjectsSimplePublicObjectWithAssociations> $results
     */
    public static function with(
        array $results,
        ?MarketingEmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<CRMObjectsSimplePublicObjectWithAssociations> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(MarketingEmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
