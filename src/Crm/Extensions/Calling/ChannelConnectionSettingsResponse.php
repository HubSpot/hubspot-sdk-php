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

    /**
     * The date and time when the channel connection settings were created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Indicates whether the channel connection settings are ready for use.
     */
    #[Required]
    public bool $isReady;

    /**
     * The date and time when the channel connection settings were last updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * The URL associated with the channel connection settings.
     */
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

    /**
     * The date and time when the channel connection settings were created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Indicates whether the channel connection settings are ready for use.
     */
    public function withIsReady(bool $isReady): self
    {
        $self = clone $this;
        $self['isReady'] = $isReady;

        return $self;
    }

    /**
     * The date and time when the channel connection settings were last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The URL associated with the channel connection settings.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
