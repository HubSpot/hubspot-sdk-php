<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry\FlagState;

/**
 * @phpstan-type BatchPortalEntryShape = array{
 *   flagState: value-of<FlagState>, portalId: int
 * }
 */
final class BatchPortalEntry implements BaseModel
{
    /** @use SdkModel<BatchPortalEntryShape> */
    use SdkModel;

    /** @var value-of<FlagState> $flagState */
    #[Api(enum: FlagState::class)]
    public string $flagState;

    #[Api]
    public int $portalId;

    /**
     * `new BatchPortalEntry()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchPortalEntry::with(flagState: ..., portalId: ...)
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
        int $portalId
    ): self {
        $obj = new self;

        $obj['flagState'] = $flagState;
        $obj['portalId'] = $portalId;

        return $obj;
    }

    /**
     * @param FlagState|value-of<FlagState> $flagState
     */
    public function withFlagState(FlagState|string $flagState): self
    {
        $obj = clone $this;
        $obj['flagState'] = $flagState;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj['portalId'] = $portalID;

        return $obj;
    }
}
