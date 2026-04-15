<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type JournalFetchResponseShape = array{
 *   currentOffset: string, expiresAt: \DateTimeInterface, url: string
 * }
 */
final class JournalFetchResponse implements BaseModel
{
    /** @use SdkModel<JournalFetchResponseShape> */
    use SdkModel;

    /**
     * A UUID string indicating the current offset in the journal data, used for pagination.
     */
    #[Required]
    public string $currentOffset;

    /**
     * The date and time when the URL will expire, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $expiresAt;

    /**
     * A string representing the URL where the fetched journal data can be accessed.
     */
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

    /**
     * A UUID string indicating the current offset in the journal data, used for pagination.
     */
    public function withCurrentOffset(string $currentOffset): self
    {
        $self = clone $this;
        $self['currentOffset'] = $currentOffset;

        return $self;
    }

    /**
     * The date and time when the URL will expire, in ISO 8601 format.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * A string representing the URL where the fetched journal data can be accessed.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
