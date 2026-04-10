<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\MarketingEvents;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2\Status;

/**
 * @phpstan-import-type MarketingEventPublicDefaultResponseV2Shape from \HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponseV2
 *
 * @phpstan-type BatchResponseMarketingEventPublicDefaultResponseV2Shape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<MarketingEventPublicDefaultResponseV2|MarketingEventPublicDefaultResponseV2Shape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponseMarketingEventPublicDefaultResponseV2 implements BaseModel
{
    /** @use SdkModel<BatchResponseMarketingEventPublicDefaultResponseV2Shape> */
    use SdkModel;

    /**
     * Timestamp of when the request was processed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<MarketingEventPublicDefaultResponseV2> $results */
    #[Required(list: MarketingEventPublicDefaultResponseV2::class)]
    public array $results;

    /**
     * Timestamp of when the request started processing.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The status of the response.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Result object of the request.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * Timestamp of when the request was sent.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseMarketingEventPublicDefaultResponseV2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseMarketingEventPublicDefaultResponseV2::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseMarketingEventPublicDefaultResponseV2)
     *   ->withCompletedAt(...)
     *   ->withResults(...)
     *   ->withStartedAt(...)
     *   ->withStatus(...)
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
     *
     * @param list<MarketingEventPublicDefaultResponseV2|MarketingEventPublicDefaultResponseV2Shape> $results
     * @param Status|value-of<Status> $status
     * @param array<string,string>|null $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        array $results,
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $links = null,
        ?\DateTimeInterface $requestedAt = null,
    ): self {
        $self = new self;

        $self['completedAt'] = $completedAt;
        $self['results'] = $results;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;

        null !== $links && $self['links'] = $links;
        null !== $requestedAt && $self['requestedAt'] = $requestedAt;

        return $self;
    }

    /**
     * Timestamp of when the request was processed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param list<MarketingEventPublicDefaultResponseV2|MarketingEventPublicDefaultResponseV2Shape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * Timestamp of when the request started processing.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The status of the response.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Result object of the request.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $self = clone $this;
        $self['links'] = $links;

        return $self;
    }

    /**
     * Timestamp of when the request was sent.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
