<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SettingsRequestShape = array{
 *   height: int,
 *   isReady: bool,
 *   name: string,
 *   supportsCustomObjects: bool,
 *   supportsInboundCalling: bool,
 *   url: string,
 *   usesCallingWindow: bool,
 *   usesRemote: bool,
 *   width: int,
 * }
 */
final class SettingsRequest implements BaseModel
{
    /** @use SdkModel<SettingsRequestShape> */
    use SdkModel;

    #[Api]
    public int $height;

    #[Api]
    public bool $isReady;

    #[Api]
    public string $name;

    #[Api]
    public bool $supportsCustomObjects;

    #[Api]
    public bool $supportsInboundCalling;

    #[Api]
    public string $url;

    #[Api]
    public bool $usesCallingWindow;

    #[Api]
    public bool $usesRemote;

    #[Api]
    public int $width;

    /**
     * `new SettingsRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingsRequest::with(
     *   height: ...,
     *   isReady: ...,
     *   name: ...,
     *   supportsCustomObjects: ...,
     *   supportsInboundCalling: ...,
     *   url: ...,
     *   usesCallingWindow: ...,
     *   usesRemote: ...,
     *   width: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingsRequest)
     *   ->withHeight(...)
     *   ->withIsReady(...)
     *   ->withName(...)
     *   ->withSupportsCustomObjects(...)
     *   ->withSupportsInboundCalling(...)
     *   ->withURL(...)
     *   ->withUsesCallingWindow(...)
     *   ->withUsesRemote(...)
     *   ->withWidth(...)
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
    public static function with(
        int $height,
        bool $isReady,
        string $name,
        bool $supportsCustomObjects,
        bool $supportsInboundCalling,
        string $url,
        bool $usesCallingWindow,
        bool $usesRemote,
        int $width,
    ): self {
        $obj = new self;

        $obj->height = $height;
        $obj->isReady = $isReady;
        $obj->name = $name;
        $obj->supportsCustomObjects = $supportsCustomObjects;
        $obj->supportsInboundCalling = $supportsInboundCalling;
        $obj->url = $url;
        $obj->usesCallingWindow = $usesCallingWindow;
        $obj->usesRemote = $usesRemote;
        $obj->width = $width;

        return $obj;
    }

    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj->isReady = $isReady;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withSupportsCustomObjects(bool $supportsCustomObjects): self
    {
        $obj = clone $this;
        $obj->supportsCustomObjects = $supportsCustomObjects;

        return $obj;
    }

    public function withSupportsInboundCalling(
        bool $supportsInboundCalling
    ): self {
        $obj = clone $this;
        $obj->supportsInboundCalling = $supportsInboundCalling;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    public function withUsesCallingWindow(bool $usesCallingWindow): self
    {
        $obj = clone $this;
        $obj->usesCallingWindow = $usesCallingWindow;

        return $obj;
    }

    public function withUsesRemote(bool $usesRemote): self
    {
        $obj = clone $this;
        $obj->usesRemote = $usesRemote;

        return $obj;
    }

    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }
}
