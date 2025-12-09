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
 *   height?: int,
 *   isReady?: bool,
 *   name?: string,
 *   supportsCustomObjects?: bool,
 *   supportsInboundCalling?: bool,
 *   url?: string,
 *   usesCallingWindow?: bool,
 *   usesRemote?: bool,
 *   width?: int,
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
        $obj = new self;

        null !== $height && $obj['height'] = $height;
        null !== $isReady && $obj['isReady'] = $isReady;
        null !== $name && $obj['name'] = $name;
        null !== $supportsCustomObjects && $obj['supportsCustomObjects'] = $supportsCustomObjects;
        null !== $supportsInboundCalling && $obj['supportsInboundCalling'] = $supportsInboundCalling;
        null !== $url && $obj['url'] = $url;
        null !== $usesCallingWindow && $obj['usesCallingWindow'] = $usesCallingWindow;
        null !== $usesRemote && $obj['usesRemote'] = $usesRemote;
        null !== $width && $obj['width'] = $width;

        return $obj;
    }

    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj['height'] = $height;

        return $obj;
    }

    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj['isReady'] = $isReady;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withSupportsCustomObjects(bool $supportsCustomObjects): self
    {
        $obj = clone $this;
        $obj['supportsCustomObjects'] = $supportsCustomObjects;

        return $obj;
    }

    public function withSupportsInboundCalling(
        bool $supportsInboundCalling
    ): self {
        $obj = clone $this;
        $obj['supportsInboundCalling'] = $supportsInboundCalling;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }

    public function withUsesCallingWindow(bool $usesCallingWindow): self
    {
        $obj = clone $this;
        $obj['usesCallingWindow'] = $usesCallingWindow;

        return $obj;
    }

    public function withUsesRemote(bool $usesRemote): self
    {
        $obj = clone $this;
        $obj['usesRemote'] = $usesRemote;

        return $obj;
    }

    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj['width'] = $width;

        return $obj;
    }
}
