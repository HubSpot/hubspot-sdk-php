<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-import-type MarketingEventPublicDefaultResponseV2Shape from \HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponseV2
 * @phpstan-import-type StandardErrorShape from \HubspotSDK\StandardError
 *
 * @phpstan-type BatchResponseMarketingEventPublicDefaultResponseV2Shape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<MarketingEventPublicDefaultResponseV2|MarketingEventPublicDefaultResponseV2Shape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   errors?: list<StandardError|StandardErrorShape>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
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

    /** @var list<StandardError>|null $errors */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * Result object of the request.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    #[Optional]
    public ?int $numErrors;

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
     * @param list<StandardError|StandardErrorShape>|null $errors
     * @param array<string,string>|null $links
     */
    public static function with(
        \DateTimeInterface $completedAt,
        array $results,
        \DateTimeInterface $startedAt,
        Status|string $status,
        ?array $errors = null,
        ?array $links = null,
        ?int $numErrors = null,
        ?\DateTimeInterface $requestedAt = null,
    ): self {
        $self = new self;

        $self['completedAt'] = $completedAt;
        $self['results'] = $results;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;

        null !== $errors && $self['errors'] = $errors;
        null !== $links && $self['links'] = $links;
        null !== $numErrors && $self['numErrors'] = $numErrors;
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
     * @param list<StandardError|StandardErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

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

    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

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
