<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaBridgeProviderRegistrationResponseShape = array{
 *   appId: int, name: string
 * }
 */
final class MediaBridgeProviderRegistrationResponse implements BaseModel
{
    /** @use SdkModel<MediaBridgeProviderRegistrationResponseShape> */
    use SdkModel;

    #[Required]
    public int $appId;

    #[Required]
    public string $name;

    /**
     * `new MediaBridgeProviderRegistrationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeProviderRegistrationResponse::with(appId: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeProviderRegistrationResponse)->withAppID(...)->withName(...)
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
    public static function with(int $appId, string $name): self
    {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['name'] = $name;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
