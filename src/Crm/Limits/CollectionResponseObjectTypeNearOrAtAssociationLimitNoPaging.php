<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ObjectTypeNearOrAtAssociationLimitShape from \HubspotSDK\Crm\Limits\ObjectTypeNearOrAtAssociationLimit
 *
 * @phpstan-type CollectionResponseObjectTypeNearOrAtAssociationLimitNoPagingShape = array{
 *   results: list<ObjectTypeNearOrAtAssociationLimitShape>
 * }
 */
final class CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPagingShape>
     */
    use SdkModel;

    /** @var list<ObjectTypeNearOrAtAssociationLimit> $results */
    #[Required(list: ObjectTypeNearOrAtAssociationLimit::class)]
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
     * @param list<ObjectTypeNearOrAtAssociationLimitShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<ObjectTypeNearOrAtAssociationLimitShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
