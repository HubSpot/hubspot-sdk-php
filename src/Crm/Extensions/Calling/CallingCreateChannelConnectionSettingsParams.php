<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Establish new channel connection settings for the specified app.
 *
 * @see HubspotSDK\Services\Crm\Extensions\CallingService::createChannelConnectionSettings()
 *
 * @phpstan-type CallingCreateChannelConnectionSettingsParamsShape = array{
 *   isReady: bool, url: string
 * }
 */
final class CallingCreateChannelConnectionSettingsParams implements BaseModel
{
    /** @use SdkModel<CallingCreateChannelConnectionSettingsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Indicates whether the channel connection settings are ready.
     */
    #[Required]
    public bool $isReady;

    /**
     * The URL associated with the channel connection settings.
     */
    #[Required]
    public string $url;

    /**
     * `new CallingCreateChannelConnectionSettingsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingCreateChannelConnectionSettingsParams::with(isReady: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallingCreateChannelConnectionSettingsParams)
     *   ->withIsReady(...)
     *   ->withURL(...)
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
     */
    public static function with(bool $isReady, string $url): self
    {
        $self = new self;

        $self['isReady'] = $isReady;
        $self['url'] = $url;

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
     * The URL associated with the channel connection settings.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
