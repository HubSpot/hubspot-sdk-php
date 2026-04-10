<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\FeatureFlags\BatchPortalEntry\FlagState;

/**
 * @phpstan-type BatchPortalEntryShape = array{
 *   flagState: FlagState|value-of<FlagState>, portalID: int
 * }
 */
final class BatchPortalEntry implements BaseModel
{
    /** @use SdkModel<BatchPortalEntryShape> */
    use SdkModel;

    /**
     * The flag state for this portal (e.g. ON or OFF).
     *
     * @var value-of<FlagState> $flagState
     */
    #[Required(enum: FlagState::class)]
    public string $flagState;

    /**
     * The ID of the portal.
     */
    #[Required('portalId')]
    public int $portalID;

    /**
     * `new BatchPortalEntry()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchPortalEntry::with(flagState: ..., portalID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchPortalEntry)->withFlagState(...)->withPortalID(...)
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
     * @param FlagState|value-of<FlagState> $flagState
     */
    public static function with(
        FlagState|string $flagState,
        int $portalID
    ): self {
        $self = new self;

        $self['flagState'] = $flagState;
        $self['portalID'] = $portalID;

        return $self;
    }

    /**
     * The flag state for this portal (e.g. ON or OFF).
     *
     * @param FlagState|value-of<FlagState> $flagState
     */
    public function withFlagState(FlagState|string $flagState): self
    {
        $self = clone $this;
        $self['flagState'] = $flagState;

        return $self;
    }

    /**
     * The ID of the portal.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }
}
