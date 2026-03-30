<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Batch;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry;

/**
 * Set the portal flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\BatchService::upsert()
 *
 * @phpstan-import-type BatchPortalEntryShape from \HubspotSDK\Crm\FeatureFlags\BatchPortalEntry
 *
 * @phpstan-type BatchUpsertParamsShape = array{
 *   appID: int, portalStates: list<BatchPortalEntry|BatchPortalEntryShape>
 * }
 */
final class BatchUpsertParams implements BaseModel
{
    /** @use SdkModel<BatchUpsertParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /** @var list<BatchPortalEntry> $portalStates */
    #[Required(list: BatchPortalEntry::class)]
    public array $portalStates;

    /**
     * `new BatchUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchUpsertParams::with(appID: ..., portalStates: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchUpsertParams)->withAppID(...)->withPortalStates(...)
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
    public static function with(int $appID, array $portalStates): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['portalStates'] = $portalStates;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

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
