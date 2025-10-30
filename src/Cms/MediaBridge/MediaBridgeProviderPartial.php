<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaBridgeProviderPartialShape = array{
 *   updatedAt: int, name?: string
 * }
 */
final class MediaBridgeProviderPartial implements BaseModel
{
    /** @use SdkModel<MediaBridgeProviderPartialShape> */
    use SdkModel;

    #[Api]
    public int $updatedAt;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj->updatedAt = $updatedAt;

        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
