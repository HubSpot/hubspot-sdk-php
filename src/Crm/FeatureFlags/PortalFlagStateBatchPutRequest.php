<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BatchPortalEntryShape from \HubSpotSDK\Crm\FeatureFlags\BatchPortalEntry
 *
 * @phpstan-type PortalFlagStateBatchPutRequestShape = array{
 *   portalStates: list<BatchPortalEntry|BatchPortalEntryShape>
 * }
 */
final class PortalFlagStateBatchPutRequest implements BaseModel
{
    /** @use SdkModel<PortalFlagStateBatchPutRequestShape> */
    use SdkModel;

    /** @var list<BatchPortalEntry> $portalStates */
    #[Required(list: BatchPortalEntry::class)]
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
     * @param list<BatchPortalEntry|BatchPortalEntryShape> $portalStates
     */
    public static function with(array $portalStates): self
    {
        $self = new self;

        $self['portalStates'] = $portalStates;

        return $self;
    }

    /**
     * @param list<BatchPortalEntry|BatchPortalEntryShape> $portalStates
     */
    public function withPortalStates(array $portalStates): self
    {
        $self = clone $this;
        $self['portalStates'] = $portalStates;

        return $self;
    }
}
