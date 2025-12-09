<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public int $height;

    #[Required]
    public bool $isReady;

    #[Required]
    public string $name;

    #[Required]
    public bool $supportsCustomObjects;

    #[Required]
    public bool $supportsInboundCalling;

    #[Required]
    public string $url;

    #[Required]
    public bool $usesCallingWindow;

    #[Required]
    public bool $usesRemote;

    #[Required]
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
        $self = new self;

        $self['height'] = $height;
        $self['isReady'] = $isReady;
        $self['name'] = $name;
        $self['supportsCustomObjects'] = $supportsCustomObjects;
        $self['supportsInboundCalling'] = $supportsInboundCalling;
        $self['url'] = $url;
        $self['usesCallingWindow'] = $usesCallingWindow;
        $self['usesRemote'] = $usesRemote;
        $self['width'] = $width;

        return $self;
    }

    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withSupportsCustomObjects(bool $supportsCustomObjects): self
    {
        $self = clone $this;
        $self['supportsCustomObjects'] = $supportsCustomObjects;

        return $self;
    }

    public function withSupportsInboundCalling(
        bool $supportsInboundCalling
    ): self {
        $self = clone $this;
        $self['supportsInboundCalling'] = $supportsInboundCalling;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    public function withUsesCallingWindow(bool $usesCallingWindow): self
    {
        $self = clone $this;
        $self['usesCallingWindow'] = $usesCallingWindow;

        return $self;
    }

    public function withUsesRemote(bool $usesRemote): self
    {
        $self = clone $this;
        $self['usesRemote'] = $usesRemote;

        return $self;
    }

    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
