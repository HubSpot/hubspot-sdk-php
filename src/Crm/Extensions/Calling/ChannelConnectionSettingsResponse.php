<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChannelConnectionSettingsResponseShape = array{
 *   createdAt: \DateTimeInterface,
 *   isReady: bool,
 *   updatedAt: \DateTimeInterface,
 *   url: string,
 * }
 */
final class ChannelConnectionSettingsResponse implements BaseModel
{
    /** @use SdkModel<ChannelConnectionSettingsResponseShape> */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public bool $isReady;

    #[Api]
    public \DateTimeInterface $updatedAt;

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

        $obj['createdAt'] = $createdAt;
        $obj['isReady'] = $isReady;
        $obj['updatedAt'] = $updatedAt;
        $obj['url'] = $url;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withIsReady(bool $isReady): self
    {
        $obj = clone $this;
        $obj['isReady'] = $isReady;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
