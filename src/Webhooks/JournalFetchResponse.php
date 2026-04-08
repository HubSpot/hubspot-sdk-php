<?php

declare(strict_types=1);

namespace HubspotSDK\Webhooks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type JournalFetchResponseShape = array{
 *   currentOffset: string, expiresAt: \DateTimeInterface, url: string
 * }
 */
final class JournalFetchResponse implements BaseModel
{
    /** @use SdkModel<JournalFetchResponseShape> */
    use SdkModel;

    #[Required]
    public string $currentOffset;

    #[Required]
    public \DateTimeInterface $expiresAt;

    #[Required]
    public string $url;

    /**
     * `new JournalFetchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JournalFetchResponse::with(currentOffset: ..., expiresAt: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JournalFetchResponse)
     *   ->withCurrentOffset(...)
     *   ->withExpiresAt(...)
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
        string $currentOffset,
        \DateTimeInterface $expiresAt,
        string $url
    ): self {
        $self = new self;

        $self['currentOffset'] = $currentOffset;
        $self['expiresAt'] = $expiresAt;
        $self['url'] = $url;

        return $self;
    }

    public function withCurrentOffset(string $currentOffset): self
    {
        $self = clone $this;
        $self['currentOffset'] = $currentOffset;

        return $self;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
