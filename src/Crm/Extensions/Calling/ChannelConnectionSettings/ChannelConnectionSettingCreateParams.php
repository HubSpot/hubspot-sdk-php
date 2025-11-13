<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\ChannelConnectionSettings;

use HubspotSDK\Core\Attributes\Api;
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

    #[Api]
    public bool $isReady;

    #[Api]
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
        $obj = new self;

        $obj->isReady = $isReady;
        $obj->url = $url;

        return $obj;
    }

    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj->isReady = $isReady;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
