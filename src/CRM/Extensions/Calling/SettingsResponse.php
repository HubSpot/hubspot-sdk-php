<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
     * When this calling extension was created.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * The target height of the iframe that will contain your phone/calling UI.
     */
    #[Api]
    public int $height;

    /**
     * When true, this indicates that your calling app is ready for production. Users will be able to select your calling app as their provider and can then click to dial within HubSpot.
     */
    #[Api]
    public bool $isReady;

    /**
     * The name of your calling service to display to users.
     */
    #[Api]
    public string $name;

    /**
     * When true, users will be able to click to dial from custom objects.
     */
    #[Api]
    public bool $supportsCustomObjects;

    /**
     * When true, this indicates that your calling app supports inbound calling within HubSpot.
     */
    #[Api]
    public bool $supportsInboundCalling;

    /**
     * The last time the settings for this calling extension were modified.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * The URL to your phone/calling UI, built with the [Calling SDK](#).
     */
    #[Api]
    public string $url;

    /**
     * When false, this indicates that your calling app does not require the use of the separate calling window to hold the call connection.
     */
    #[Api]
    public bool $usesCallingWindow;

    /**
     * When false, this indicates that your calling app does not use the anchored calling remote within the HubSpot app.
     */
    #[Api]
    public bool $usesRemote;

    /**
     * The target width of the iframe that will contain your phone/calling UI.
     */
    #[Api]
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
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->height = $height;
        $obj->isReady = $isReady;
        $obj->name = $name;
        $obj->supportsCustomObjects = $supportsCustomObjects;
        $obj->supportsInboundCalling = $supportsInboundCalling;
        $obj->updatedAt = $updatedAt;
        $obj->url = $url;
        $obj->usesCallingWindow = $usesCallingWindow;
        $obj->usesRemote = $usesRemote;
        $obj->width = $width;

        return $obj;
    }

    /**
     * When this calling extension was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
     * The name of your calling service to display to users.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

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
     * The last time the settings for this calling extension were modified.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

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
