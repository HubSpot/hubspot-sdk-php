<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public bool $isReady;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Required]
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
        $self = new self;

        $self['createdAt'] = $createdAt;
        $self['isReady'] = $isReady;
        $self['updatedAt'] = $updatedAt;
        $self['url'] = $url;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
