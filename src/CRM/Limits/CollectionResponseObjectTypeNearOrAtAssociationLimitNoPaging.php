<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CollectionResponseObjectTypeNearOrAtAssociationLimitNoPagingShape = array{
 *   results: list<ObjectTypeNearOrAtAssociationLimit>
 * }
 */
final class CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging implements BaseModel, ResponseConverter
{
    /**
     * @use SdkModel<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPagingShape>
     */
    use SdkModel;

    use SdkResponse;

    /** @var list<ObjectTypeNearOrAtAssociationLimit> $results */
    #[Api(list: ObjectTypeNearOrAtAssociationLimit::class)]
    public array $results;

    /**
     * `new CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging)
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
     * @param list<ObjectTypeNearOrAtAssociationLimit> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<ObjectTypeNearOrAtAssociationLimit> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
