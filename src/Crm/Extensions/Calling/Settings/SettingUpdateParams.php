<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\Settings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\Extensions\Calling\SettingsService::update()
 *
 * @phpstan-type SettingUpdateParamsShape = array{
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
final class SettingUpdateParams implements BaseModel
{
    /** @use SdkModel<SettingUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $height;

    #[Optional]
    public ?bool $isReady;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?bool $supportsCustomObjects;

    #[Optional]
    public ?bool $supportsInboundCalling;

    #[Optional]
    public ?string $url;

    #[Optional]
    public ?bool $usesCallingWindow;

    #[Optional]
    public ?bool $usesRemote;

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
