<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\FeatureFlags;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStatePutRequest\FlagState;

/**
 * @phpstan-type PortalFlagStatePutRequestShape = array{
 *   flagState: value-of<FlagState>
 * }
 */
final class PortalFlagStatePutRequest implements BaseModel
{
    /** @use SdkModel<PortalFlagStatePutRequestShape> */
    use SdkModel;

    /** @var value-of<FlagState> $flagState */
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
     * @param FlagState|value-of<FlagState> $flagState
     */
    public function withFlagState(FlagState|string $flagState): self
    {
        $self = clone $this;
        $self['flagState'] = $flagState;

        return $self;
    }
}
