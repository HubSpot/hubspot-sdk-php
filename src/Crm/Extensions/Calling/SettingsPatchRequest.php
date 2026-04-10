<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SettingsPatchRequestShape = array{
 *   height?: int|null,
 *   isReady?: bool|null,
 *   name?: string|null,
 *   supportsCustomObjects?: bool|null,
 *   supportsInboundCalling?: bool|null,
 *   url?: string|null,
 *   usesCallingWindow?: bool|null,
 *   usesRemote?: bool|null,
 *   width?: int|null,
 * }
 */
final class SettingsPatchRequest implements BaseModel
{
    /** @use SdkModel<SettingsPatchRequestShape> */
    use SdkModel;

    /**
     * The height setting for the calling extension interface.
     */
    #[Optional]
    public ?int $height;

    /**
     * Specifies whether the calling extension is ready for use.
     */
    #[Optional]
    public ?bool $isReady;

    /**
     * The name of the calling extension.
     */
    #[Optional]
    public ?string $name;

    /**
     * Indicates if the calling extension supports custom objects.
     */
    #[Optional]
    public ?bool $supportsCustomObjects;

    /**
     * Indicates if the calling extension supports inbound calling.
     */
    #[Optional]
    public ?bool $supportsInboundCalling;

    /**
     * The URL associated with the calling extension settings.
     */
    #[Optional]
    public ?string $url;

    /**
     * Indicates if the calling extension uses a calling window.
     */
    #[Optional]
    public ?bool $usesCallingWindow;

    /**
     * Indicates if the calling extension uses a remote connection.
     */
    #[Optional]
    public ?bool $usesRemote;

    /**
     * The width setting for the calling extension interface.
     */
    #[Optional]
    public ?int $width;

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
        ?int $height = null,
        ?bool $isReady = null,
        ?string $name = null,
        ?bool $supportsCustomObjects = null,
        ?bool $supportsInboundCalling = null,
        ?string $url = null,
        ?bool $usesCallingWindow = null,
        ?bool $usesRemote = null,
        ?int $width = null,
    ): self {
        $self = new self;

        null !== $height && $self['height'] = $height;
        null !== $isReady && $self['isReady'] = $isReady;
        null !== $name && $self['name'] = $name;
        null !== $supportsCustomObjects && $self['supportsCustomObjects'] = $supportsCustomObjects;
        null !== $supportsInboundCalling && $self['supportsInboundCalling'] = $supportsInboundCalling;
        null !== $url && $self['url'] = $url;
        null !== $usesCallingWindow && $self['usesCallingWindow'] = $usesCallingWindow;
        null !== $usesRemote && $self['usesRemote'] = $usesRemote;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    /**
     * The height setting for the calling extension interface.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * Specifies whether the calling extension is ready for use.
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
     * The URL associated with the calling extension settings.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Indicates if the calling extension uses a calling window.
     */
    public function withUsesCallingWindow(bool $usesCallingWindow): self
    {
        $self = clone $this;
        $self['usesCallingWindow'] = $usesCallingWindow;

        return $self;
    }

    /**
     * Indicates if the calling extension uses a remote connection.
     */
    public function withUsesRemote(bool $usesRemote): self
    {
        $self = clone $this;
        $self['usesRemote'] = $usesRemote;

        return $self;
    }

    /**
     * The width setting for the calling extension interface.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
