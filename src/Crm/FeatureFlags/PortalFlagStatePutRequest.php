<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\FeatureFlags;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\FeatureFlags\PortalFlagStatePutRequest\FlagState;

/**
 * @phpstan-type PortalFlagStatePutRequestShape = array{
 *   flagState: FlagState|value-of<FlagState>
 * }
 */
final class PortalFlagStatePutRequest implements BaseModel
{
    /** @use SdkModel<PortalFlagStatePutRequestShape> */
    use SdkModel;

    /**
     * The state that the given flag should be in for this portal.
     *
     * @var value-of<FlagState> $flagState
     */
    #[Required(enum: FlagState::class)]
    public string $flagState;

    /**
     * `new PortalFlagStatePutRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortalFlagStatePutRequest::with(flagState: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortalFlagStatePutRequest)->withFlagState(...)
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
    public static function with(FlagState|string $flagState): self
    {
        $self = new self;

        $self['flagState'] = $flagState;

        return $self;
    }

    /**
     * The state that the given flag should be in for this portal.
     *
     * @param FlagState|value-of<FlagState> $flagState
     */
    public function withFlagState(FlagState|string $flagState): self
    {
        $self = clone $this;
        $self['flagState'] = $flagState;

        return $self;
    }
}
