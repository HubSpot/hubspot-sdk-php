<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type extensions_calling_settings_request = array{
 *   name: string,
 *   url: string,
 *   height?: int,
 *   isReady?: bool,
 *   supportsCustomObjects?: bool,
 *   supportsInboundCalling?: bool,
 *   usesCallingWindow?: bool,
 *   usesRemote?: bool,
 *   width?: int,
 * }
 */
final class ExtensionsCallingSettingsRequest implements BaseModel
{
    /** @use SdkModel<extensions_calling_settings_request> */
    use SdkModel;

    #[Api]
    public string $name;

    #[Api]
    public string $url;

    #[Api(optional: true)]
    public ?int $height;

    #[Api(optional: true)]
    public ?bool $isReady;

    #[Api(optional: true)]
    public ?bool $supportsCustomObjects;

    #[Api(optional: true)]
    public ?bool $supportsInboundCalling;

    #[Api(optional: true)]
    public ?bool $usesCallingWindow;

    #[Api(optional: true)]
    public ?bool $usesRemote;

    #[Api(optional: true)]
    public ?int $width;

    /**
     * `new ExtensionsCallingSettingsRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExtensionsCallingSettingsRequest::with(name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExtensionsCallingSettingsRequest)->withName(...)->withURL(...)
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
        string $name,
        string $url,
        ?int $height = null,
        ?bool $isReady = null,
        ?bool $supportsCustomObjects = null,
        ?bool $supportsInboundCalling = null,
        ?bool $usesCallingWindow = null,
        ?bool $usesRemote = null,
        ?int $width = null,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->url = $url;

        null !== $height && $obj->height = $height;
        null !== $isReady && $obj->isReady = $isReady;
        null !== $supportsCustomObjects && $obj->supportsCustomObjects = $supportsCustomObjects;
        null !== $supportsInboundCalling && $obj->supportsInboundCalling = $supportsInboundCalling;
        null !== $usesCallingWindow && $obj->usesCallingWindow = $usesCallingWindow;
        null !== $usesRemote && $obj->usesRemote = $usesRemote;
        null !== $width && $obj->width = $width;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

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
