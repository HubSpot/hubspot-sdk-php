<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2WithErrors\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-import-type MarketingEventPublicDefaultResponseV2Shape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponseV2
 * @phpstan-import-type StandardErrorShape from \HubspotSDK\StandardError
 *
 * @phpstan-type BatchResponseMarketingEventPublicDefaultResponseV2WithErrorsShape = array{
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
final class BatchResponseMarketingEventPublicDefaultResponseV2WithErrors implements BaseModel
{
    /**
     * @use SdkModel<BatchResponseMarketingEventPublicDefaultResponseV2WithErrorsShape>
     */
    use SdkModel;

    /**
     * Timestamp that represents when the request finished processing.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<MarketingEventPublicDefaultResponseV2> $results */
    #[Required(list: MarketingEventPublicDefaultResponseV2::class)]
    public array $results;

    /**
     * Timestamp that represents when the request started processing.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The status of the request processing.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * Result of the request.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The number of errors that occurred during the processing.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * Timestamp that represents when the request was made.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponseMarketingEventPublicDefaultResponseV2WithErrors()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponseMarketingEventPublicDefaultResponseV2WithErrors::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponseMarketingEventPublicDefaultResponseV2WithErrors)
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
     * Timestamp that represents when the request finished processing.
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
     * Timestamp that represents when the request started processing.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The status of the request processing.
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
     * Result of the request.
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
     * The number of errors that occurred during the processing.
     */
    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    /**
     * Timestamp that represents when the request was made.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
