<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign\Status;

/**
 * @phpstan-import-type PublicCampaignShape from \HubspotSDK\Marketing\Campaigns\PublicCampaign
 *
 * @phpstan-type BatchResponsePublicCampaignShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicCampaign|PublicCampaignShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicCampaign implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicCampaignShape> */
    use SdkModel;

    /**
     * The date and time when the batch operation was completed, formatted as a date-time string.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * An array of results from the batch operation, each item representing a public campaign.
     *
     * @var list<PublicCampaign> $results
     */
    #[Required(list: PublicCampaign::class)]
    public array $results;

    /**
     * The date and time when the batch operation started, formatted as a date-time string.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * A map of related links associated with the batch operation.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The date and time when the batch operation was requested, formatted as a date-time string.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicCampaign()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicCampaign::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicCampaign)
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
     * @param list<PublicCampaign|PublicCampaignShape> $results
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
     * The date and time when the batch operation was completed, formatted as a date-time string.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * An array of results from the batch operation, each item representing a public campaign.
     *
     * @param list<PublicCampaign|PublicCampaignShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The date and time when the batch operation started, formatted as a date-time string.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
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
     * A map of related links associated with the batch operation.
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
     * The date and time when the batch operation was requested, formatted as a date-time string.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
