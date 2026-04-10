<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SettingsResponseShape = array{
 *   createdAt: \DateTimeInterface,
 *   height: int,
 *   isReady: bool,
 *   name: string,
 *   supportsCustomObjects: bool,
 *   supportsInboundCalling: bool,
 *   updatedAt: \DateTimeInterface,
 *   url: string,
 *   usesCallingWindow: bool,
 *   usesRemote: bool,
 *   width: int,
 * }
 */
final class SettingsResponse implements BaseModel
{
    /** @use SdkModel<SettingsResponseShape> */
    use SdkModel;

    /**
     * The date and time when the calling extension settings were created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The height of the calling extension interface.
     */
    #[Required]
    public int $height;

    /**
     * Specifies whether the calling extension settings are ready for use.
     */
    #[Required]
    public bool $isReady;

    /**
     * The name of the calling extension.
     */
    #[Required]
    public string $name;

    /**
     * Indicates if the calling extension supports custom objects.
     */
    #[Required]
    public bool $supportsCustomObjects;

    /**
     * Indicates if the calling extension supports inbound calling.
     */
    #[Required]
    public bool $supportsInboundCalling;

    /**
     * The date and time when the calling extension settings were last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The URL associated with the calling extension.
     */
    #[Required]
    public string $url;

    /**
     * Specifies if the calling extension uses a dedicated calling window.
     */
    #[Required]
    public bool $usesCallingWindow;

    /**
     * Indicates if the calling extension uses a remote service.
     */
    #[Required]
    public bool $usesRemote;

    /**
     * The width of the calling extension interface.
     */
    #[Required]
    public int $width;

    /**
     * `new SettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingsResponse::with(
     *   createdAt: ...,
     *   height: ...,
     *   isReady: ...,
     *   name: ...,
     *   supportsCustomObjects: ...,
     *   supportsInboundCalling: ...,
     *   updatedAt: ...,
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
     * (new SettingsResponse)
     *   ->withCreatedAt(...)
     *   ->withHeight(...)
     *   ->withIsReady(...)
     *   ->withName(...)
     *   ->withSupportsCustomObjects(...)
     *   ->withSupportsInboundCalling(...)
     *   ->withUpdatedAt(...)
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
        \DateTimeInterface $createdAt,
        int $height,
        bool $isReady,
        string $name,
        bool $supportsCustomObjects,
        bool $supportsInboundCalling,
        \DateTimeInterface $updatedAt,
        string $url,
        bool $usesCallingWindow,
        bool $usesRemote,
        int $width,
    ): self {
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['height'] = $height;
        $self['isReady'] = $isReady;
        $self['name'] = $name;
        $self['supportsCustomObjects'] = $supportsCustomObjects;
        $self['supportsInboundCalling'] = $supportsInboundCalling;
        $self['updatedAt'] = $updatedAt;
        $self['url'] = $url;
        $self['usesCallingWindow'] = $usesCallingWindow;
        $self['usesRemote'] = $usesRemote;
        $self['width'] = $width;

        return $self;
    }

    /**
     * The date and time when the calling extension settings were created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The height of the calling extension interface.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * Specifies whether the calling extension settings are ready for use.
     */
    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    /**
     * The name of the calling extension.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Indicates if the calling extension supports custom objects.
     */
    public function withSupportsCustomObjects(bool $supportsCustomObjects): self
    {
        $self = clone $this;
        $self['supportsCustomObjects'] = $supportsCustomObjects;

        return $self;
    }

    /**
     * Indicates if the calling extension supports inbound calling.
     */
    public function withSupportsInboundCalling(
        bool $supportsInboundCalling
    ): self {
        $self = clone $this;
        $self['supportsInboundCalling'] = $supportsInboundCalling;

        return $self;
    }

    /**
     * The date and time when the calling extension settings were last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The URL associated with the calling extension.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Specifies if the calling extension uses a dedicated calling window.
     */
    public function withUsesCallingWindow(bool $usesCallingWindow): self
    {
        $self = clone $this;
        $self['usesCallingWindow'] = $usesCallingWindow;

        return $self;
    }

    /**
     * Indicates if the calling extension uses a remote service.
     */
    public function withUsesRemote(bool $usesRemote): self
    {
        $self = clone $this;
        $self['usesRemote'] = $usesRemote;

        return $self;
    }

    /**
     * The width of the calling extension interface.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
