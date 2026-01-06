<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags\Portals;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams\FlagState;

/**
 * Specify an account-level flag state for a specific HubSpot account.
 *
 * @see HubspotSDK\Services\Crm\FeatureFlags\PortalsService::update()
 *
 * @phpstan-type PortalUpdateParamsShape = array{
 *   appID: int, flagName: string, flagState: FlagState|value-of<FlagState>
 * }
 */
final class PortalUpdateParams implements BaseModel
{
    /** @use SdkModel<PortalUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $flagName;

    /** @var value-of<FlagState> $flagState */
    #[Required(enum: FlagState::class)]
    public string $flagState;

    /**
     * `new PortalUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalUpdateParams::with(appID: ..., flagName: ..., flagState: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalUpdateParams)->withAppID(...)->withFlagName(...)->withFlagState(...)
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
        int $appID,
        string $flagName,
        FlagState|string $flagState
    ): self {
        $obj = new self;

        $obj['appID'] = $appID;
        $obj['flagName'] = $flagName;
        $obj['flagState'] = $flagState;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    public function withFlagName(string $flagName): self
    {
        $obj = clone $this;
        $obj['flagName'] = $flagName;

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
}
