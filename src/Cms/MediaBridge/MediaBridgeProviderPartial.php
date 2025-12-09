<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaBridgeProviderPartialShape = array{
 *   updatedAt: int, name?: string|null
 * }
 */
final class MediaBridgeProviderPartial implements BaseModel
{
    /** @use SdkModel<MediaBridgeProviderPartialShape> */
    use SdkModel;

    #[Required]
    public int $updatedAt;

    #[Optional]
    public ?string $name;

    /**
     * `new MediaBridgeProviderPartial()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeProviderPartial::with(updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeProviderPartial)->withUpdatedAt(...)
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
    public static function with(int $updatedAt, ?string $name = null): self
    {
        $self = new self;

        $self['updatedAt'] = $updatedAt;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
