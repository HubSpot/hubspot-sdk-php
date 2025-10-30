<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling\Settings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Set the menu label, target iframe URL, and dimensions for your calling extension.
 *
 * @see HubspotSDK\CRM\Extensions\Calling\Settings->create
 *
 * @phpstan-type SettingCreateParamsShape = array{
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
final class SettingCreateParams implements BaseModel
{
    /** @use SdkModel<SettingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The name of your calling service to display to users.
     */
    #[Api]
    public string $name;

    /**
     * The URL to your phone/calling UI, built with the [Calling SDK](#).
     */
    #[Api]
    public string $url;

    /**
     * The target height of the iframe that will contain your phone/calling UI.
     */
    #[Api(optional: true)]
    public ?int $height;

    /**
     * When true, this indicates that your calling app is ready for production. Users will be able to select your calling app as their provider and can then click to dial within HubSpot.
     */
    #[Api(optional: true)]
    public ?bool $isReady;

    /**
     * When true, users will be able to click to dial from custom objects.
     */
    #[Api(optional: true)]
    public ?bool $supportsCustomObjects;

    /**
     * When true, this indicates that your calling app supports inbound calling within HubSpot.
     */
    #[Api(optional: true)]
    public ?bool $supportsInboundCalling;

    /**
     * When false, this indicates that your calling app does not require the use of the separate calling window to hold the call connection.
     */
    #[Api(optional: true)]
    public ?bool $usesCallingWindow;

    /**
     * When false, this indicates that your calling app does not use the anchored calling remote within the HubSpot app.
     */
    #[Api(optional: true)]
    public ?bool $usesRemote;

    /**
     * The target width of the iframe that will contain your phone/calling UI.
     */
    #[Api(optional: true)]
    public ?int $width;

    /**
     * `new SettingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingCreateParams::with(name: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingCreateParams)->withName(...)->withURL(...)
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

    /**
     * The name of your calling service to display to users.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The URL to your phone/calling UI, built with the [Calling SDK](#).
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * The target height of the iframe that will contain your phone/calling UI.
     */
    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    /**
     * When true, this indicates that your calling app is ready for production. Users will be able to select your calling app as their provider and can then click to dial within HubSpot.
     */
    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj->isReady = $isReady;

        return $obj;
    }

    /**
     * When true, users will be able to click to dial from custom objects.
     */
    public function withSupportsCustomObjects(bool $supportsCustomObjects): self
    {
        $obj = clone $this;
        $obj->supportsCustomObjects = $supportsCustomObjects;

        return $obj;
    }

    /**
     * When true, this indicates that your calling app supports inbound calling within HubSpot.
     */
    public function withSupportsInboundCalling(
        bool $supportsInboundCalling
    ): self {
        $obj = clone $this;
        $obj->supportsInboundCalling = $supportsInboundCalling;

        return $obj;
    }

    /**
     * When false, this indicates that your calling app does not require the use of the separate calling window to hold the call connection.
     */
    public function withUsesCallingWindow(bool $usesCallingWindow): self
    {
        $obj = clone $this;
        $obj->usesCallingWindow = $usesCallingWindow;

        return $obj;
    }

    /**
     * When false, this indicates that your calling app does not use the anchored calling remote within the HubSpot app.
     */
    public function withUsesRemote(bool $usesRemote): self
    {
        $obj = clone $this;
        $obj->usesRemote = $usesRemote;

        return $obj;
    }

    /**
     * The target width of the iframe that will contain your phone/calling UI.
     */
    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }
}
