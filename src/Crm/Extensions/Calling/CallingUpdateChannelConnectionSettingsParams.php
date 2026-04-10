<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Modify the existing channel connection settings for the specified app.
 *
 * @see HubSpotSDK\Services\Crm\Extensions\CallingService::updateChannelConnectionSettings()
 *
 * @phpstan-type CallingUpdateChannelConnectionSettingsParamsShape = array{
 *   isReady?: bool|null, url?: string|null
 * }
 */
final class CallingUpdateChannelConnectionSettingsParams implements BaseModel
{
    /** @use SdkModel<CallingUpdateChannelConnectionSettingsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Indicates whether the channel connection settings are ready.
     */
    #[Optional]
    public ?bool $isReady;

    /**
     * The URL for the channel connection settings.
     */
    #[Optional]
    public ?string $url;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $isReady = null, ?string $url = null): self
    {
        $self = new self;

        null !== $isReady && $self['isReady'] = $isReady;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    /**
     * Indicates whether the channel connection settings are ready.
     */
    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    /**
     * The URL for the channel connection settings.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
