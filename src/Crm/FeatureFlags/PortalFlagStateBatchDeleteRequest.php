<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortalFlagStateBatchDeleteRequestShape = array{
 *   portalIDs: list<int>
 * }
 */
final class PortalFlagStateBatchDeleteRequest implements BaseModel
{
    /** @use SdkModel<PortalFlagStateBatchDeleteRequestShape> */
    use SdkModel;

    /** @var list<int> $portalIDs */
    #[Required('portalIds', list: 'int')]
    public array $portalIDs;

    /**
     * `new PortalFlagStateBatchDeleteRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalFlagStateBatchDeleteRequest::with(portalIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalFlagStateBatchDeleteRequest)->withPortalIDs(...)
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
     * @param list<int> $portalIDs
     */
    public static function with(array $portalIDs): self
    {
        $self = new self;

        $self['portalIDs'] = $portalIDs;

        return $self;
    }

    /**
     * @param list<int> $portalIDs
     */
    public function withPortalIDs(array $portalIDs): self
    {
        $self = clone $this;
        $self['portalIDs'] = $portalIDs;

        return $self;
    }
}
