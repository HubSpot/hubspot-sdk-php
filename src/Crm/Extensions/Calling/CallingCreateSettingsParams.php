<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create new settings for the calling extension associated with the specified appId.
 *
 * @see HubSpotSDK\Services\Crm\Extensions\CallingService::createSettings()
 *
 * @phpstan-type CallingCreateSettingsParamsShape = array{
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
final class CallingCreateSettingsParams implements BaseModel
{
    /** @use SdkModel<CallingCreateSettingsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies the height of the calling extension interface.
     */
    #[Required]
    public int $height;

    /**
     * Indicates if the calling extension is ready for use.
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
     * The URL associated with the calling extension.
     */
    #[Required]
    public string $url;

    /**
     * Indicates if the calling extension uses a separate calling window.
     */
    #[Required]
    public bool $usesCallingWindow;

    /**
     * Indicates if the calling extension uses remote services.
     */
    #[Required]
    public bool $usesRemote;

    /**
     * Specifies the width of the calling extension interface.
     */
    #[Required]
    public int $width;

    /**
     * `new CallingCreateSettingsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallingCreateSettingsParams::with(
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
     * (new CallingCreateSettingsParams)
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

    /**
     * Specifies the height of the calling extension interface.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * Indicates if the calling extension is ready for use.
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
     * The URL associated with the calling extension.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Indicates if the calling extension uses a separate calling window.
     */
    public function withUsesCallingWindow(bool $usesCallingWindow): self
    {
        $self = clone $this;
        $self['usesCallingWindow'] = $usesCallingWindow;

        return $self;
    }

    /**
     * Indicates if the calling extension uses remote services.
     */
    public function withUsesRemote(bool $usesRemote): self
    {
        $self = clone $this;
        $self['usesRemote'] = $usesRemote;

        return $self;
    }

    /**
     * Specifies the width of the calling extension interface.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
