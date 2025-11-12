<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChannelConnectionSettingsPatchRequestShape = array{
 *   isReady?: bool|null, url?: string|null
 * }
 */
final class ChannelConnectionSettingsPatchRequest implements BaseModel
{
    /** @use SdkModel<ChannelConnectionSettingsPatchRequestShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?bool $isReady;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $isReady && $obj->isReady = $isReady;
        null !== $url && $obj->url = $url;

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
