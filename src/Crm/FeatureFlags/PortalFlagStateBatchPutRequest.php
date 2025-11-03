<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortalFlagStateBatchPutRequestShape = array{
 *   portalStates: list<BatchPortalEntry>
 * }
 */
final class PortalFlagStateBatchPutRequest implements BaseModel
{
    /** @use SdkModel<PortalFlagStateBatchPutRequestShape> */
    use SdkModel;

    /** @var list<BatchPortalEntry> $portalStates */
    #[Api(list: BatchPortalEntry::class)]
    public array $portalStates;

    /**
     * `new PortalFlagStateBatchPutRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalFlagStateBatchPutRequest::with(portalStates: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalFlagStateBatchPutRequest)->withPortalStates(...)
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
     * @param list<BatchPortalEntry> $portalStates
     */
    public static function with(array $portalStates): self
    {
        $obj = new self;

        $obj->portalStates = $portalStates;

        return $obj;
    }

    /**
     * @param list<BatchPortalEntry> $portalStates
     */
    public function withPortalStates(array $portalStates): self
    {
        $obj = clone $this;
        $obj->portalStates = $portalStates;

        return $obj;
    }
}
