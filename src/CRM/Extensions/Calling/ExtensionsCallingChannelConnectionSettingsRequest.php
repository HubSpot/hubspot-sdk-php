<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type extensions_calling_channel_connection_settings_request = array{
 *   isReady: bool, url: string
 * }
 */
final class ExtensionsCallingChannelConnectionSettingsRequest implements BaseModel
{
    /** @use SdkModel<extensions_calling_channel_connection_settings_request> */
    use SdkModel;

    #[Api]
    public bool $isReady;

    #[Api]
    public string $url;

    /**
     * `new ExtensionsCallingChannelConnectionSettingsRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtensionsCallingChannelConnectionSettingsRequest::with(isReady: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExtensionsCallingChannelConnectionSettingsRequest)
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
