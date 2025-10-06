<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Paging;

/**
 * @phpstan-type collection_response_simple_public_object_with_associations = array{
 *   results: list<SimplePublicObjectWithAssociations>, paging?: Paging
 * }
 */
final class CollectionResponseSimplePublicObjectWithAssociations implements BaseModel
{
    /** @use SdkModel<collection_response_simple_public_object_with_associations> */
    use SdkModel;

    /** @var list<SimplePublicObjectWithAssociations> $results */
    #[Api(list: SimplePublicObjectWithAssociations::class)]
    public array $results;

    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseSimplePublicObjectWithAssociations()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseSimplePublicObjectWithAssociations::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseSimplePublicObjectWithAssociations)->withResults(...)
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
     * @param list<SimplePublicObjectWithAssociations> $results
     */
    public static function with(array $results, ?Paging $paging = null): self
    {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectWithAssociations> $results
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
