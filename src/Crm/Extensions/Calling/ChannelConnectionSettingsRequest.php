<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChannelConnectionSettingsRequestShape = array{
 *   isReady: bool, url: string
 * }
 */
final class ChannelConnectionSettingsRequest implements BaseModel
{
    /** @use SdkModel<ChannelConnectionSettingsRequestShape> */
    use SdkModel;

    #[Required]
    public bool $isReady;

    #[Required]
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

        $obj['isReady'] = $isReady;
        $obj['url'] = $url;

        return $obj;
    }

    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj['isReady'] = $isReady;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
