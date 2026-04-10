<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaBridgeProviderRegistrationResponseShape = array{
 *   appID: int, name: string
 * }
 */
final class MediaBridgeProviderRegistrationResponse implements BaseModel
{
    /** @use SdkModel<MediaBridgeProviderRegistrationResponseShape> */
    use SdkModel;

    #[Required('appId')]
    public int $appID;

    #[Required]
    public string $name;

    /**
     * `new MediaBridgeProviderRegistrationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeProviderRegistrationResponse::with(appID: ..., name: ...)
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
    public static function with(int $appID, string $name): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['name'] = $name;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
