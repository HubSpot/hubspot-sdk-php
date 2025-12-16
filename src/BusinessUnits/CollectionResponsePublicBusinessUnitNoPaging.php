<?php

declare(strict_types=1);

namespace HubspotSDK\BusinessUnits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\PublicBusinessUnit;

/**
 * A response object containing a collection of Business Units.
 *
 * @phpstan-import-type PublicBusinessUnitShape from \HubspotSDK\Marketing\Campaigns\PublicBusinessUnit
 *
 * @phpstan-type CollectionResponsePublicBusinessUnitNoPagingShape = array{
 *   results: list<PublicBusinessUnitShape>
 * }
 */
final class CollectionResponsePublicBusinessUnitNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicBusinessUnitNoPagingShape> */
    use SdkModel;

    /**
     * The collection of Business Units.
     *
     * @var list<PublicBusinessUnit> $results
     */
    #[Required(list: PublicBusinessUnit::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicBusinessUnitNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicBusinessUnitNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicBusinessUnitNoPaging)->withResults(...)
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
     * @param list<PublicBusinessUnitShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * The collection of Business Units.
     *
     * @param list<PublicBusinessUnitShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
