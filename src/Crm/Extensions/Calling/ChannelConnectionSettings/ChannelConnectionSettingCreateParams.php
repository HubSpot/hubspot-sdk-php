<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Extensions\Calling\ChannelConnectionSettingsService::create()
 *
 * @phpstan-type ChannelConnectionSettingCreateParamsShape = array{
 *   isReady: bool, url: string
 * }
 */
final class ChannelConnectionSettingCreateParams implements BaseModel
{
    /** @use SdkModel<ChannelConnectionSettingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public bool $isReady;

    #[Required]
    public string $url;

    /**
     * `new ChannelConnectionSettingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelConnectionSettingCreateParams::with(isReady: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelConnectionSettingCreateParams)->withIsReady(...)->withURL(...)
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

    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
