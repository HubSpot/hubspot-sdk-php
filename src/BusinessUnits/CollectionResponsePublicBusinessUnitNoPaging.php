<?php

declare(strict_types=1);

namespace HubSpotSDK\BusinessUnits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicBusinessUnitShape from \HubSpotSDK\BusinessUnits\PublicBusinessUnit
 *
 * @phpstan-type CollectionResponsePublicBusinessUnitNoPagingShape = array{
 *   results: list<PublicBusinessUnit|PublicBusinessUnitShape>
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
     * @param list<PublicBusinessUnit|PublicBusinessUnitShape> $results
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
     * @param list<PublicBusinessUnit|PublicBusinessUnitShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
