<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type channel_connection_settings_response = array{
 *   createdAt: \DateTimeInterface,
 *   isReady: bool,
 *   updatedAt: \DateTimeInterface,
 *   url: string,
 * }
 */
final class ChannelConnectionSettingsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<channel_connection_settings_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * The timestamp this setting was created.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * If true, this app will be considered to support channel connection.
     */
    #[Api]
    public bool $isReady;

    /**
     * The timestamp this setting was last updated.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * The URL to fetch phone numbers available for channel connection.
     */
    #[Api]
    public string $url;

    /**
     * `new ChannelConnectionSettingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChannelConnectionSettingsResponse::with(
     *   createdAt: ..., isReady: ..., updatedAt: ..., url: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChannelConnectionSettingsResponse)
     *   ->withCreatedAt(...)
     *   ->withIsReady(...)
     *   ->withUpdatedAt(...)
     *   ->withURL(...)
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
        bool $isReady,
        \DateTimeInterface $updatedAt,
        string $url,
    ): self {
        $obj = new self;

        $obj->createdAt = $createdAt;
        $obj->isReady = $isReady;
        $obj->updatedAt = $updatedAt;
        $obj->url = $url;

        return $obj;
    }

    /**
     * The timestamp this setting was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * If true, this app will be considered to support channel connection.
     */
    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj->isReady = $isReady;

        return $obj;
    }

    /**
     * The timestamp this setting was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The URL to fetch phone numbers available for channel connection.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }
}
