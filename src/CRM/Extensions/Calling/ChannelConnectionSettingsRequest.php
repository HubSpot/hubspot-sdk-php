<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type channel_connection_settings_request = array{
 *   isReady: bool, url: string
 * }
 */
final class ChannelConnectionSettingsRequest implements BaseModel
{
    /** @use SdkModel<channel_connection_settings_request> */
    use SdkModel;

    /**
     * If true, this app will be considered to support channel connection.
     */
    #[Api]
    public bool $isReady;

    /**
     * The URL to fetch phone numbers available for channel connection.
     */
    #[Api]
    public string $url;

    /**
     * `new ChannelConnectionSettingsRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelConnectionSettingsRequest::with(isReady: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelConnectionSettingsRequest)->withIsReady(...)->withURL(...)
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

    /**
     * If true, this app will be considered to support channel connection.
     */
    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj->isReady = $isReady;

        return $obj;
    }

    /**
     * The URL to fetch phone numbers available for channel connection.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
