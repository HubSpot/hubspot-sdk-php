<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ObjectTypeNearOrAtAssociationLimitShape from \HubSpotSDK\Crm\Limits\ObjectTypeNearOrAtAssociationLimit
 *
 * @phpstan-type CollectionResponseObjectTypeNearOrAtAssociationLimitNoPagingShape = array{
 *   results: list<ObjectTypeNearOrAtAssociationLimit|ObjectTypeNearOrAtAssociationLimitShape>,
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
     * @param list<ObjectTypeNearOrAtAssociationLimit|ObjectTypeNearOrAtAssociationLimitShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<ObjectTypeNearOrAtAssociationLimit|ObjectTypeNearOrAtAssociationLimitShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
