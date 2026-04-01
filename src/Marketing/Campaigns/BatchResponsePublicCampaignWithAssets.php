<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets\Status;

/**
 * @phpstan-import-type PublicCampaignWithAssetsShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets
 *
 * @phpstan-type BatchResponsePublicCampaignWithAssetsShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicCampaignWithAssets|PublicCampaignWithAssetsShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   links?: array<string,string>|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicCampaignWithAssets implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicCampaignWithAssetsShape> */
    use SdkModel;

    /**
     * The timestamp when the batch request processing was completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * An array of results from the batch operation, each representing a public campaign with assets.
     *
     * @var list<PublicCampaignWithAssets> $results
     */
    #[Required(list: PublicCampaignWithAssets::class)]
    public array $results;

    /**
     * The timestamp when the processing of the batch request began.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current processing status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * A collection of URLs linking to related resources or documentation.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The timestamp when the batch request was initially made.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicCampaignWithAssets()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicCampaignWithAssets::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicCampaignWithAssets)
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
     * @param list<PublicCampaignWithAssets|PublicCampaignWithAssetsShape> $results
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
     * The timestamp when the batch request processing was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * An array of results from the batch operation, each representing a public campaign with assets.
     *
     * @param list<PublicCampaignWithAssets|PublicCampaignWithAssetsShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The timestamp when the processing of the batch request began.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current processing status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
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
     * A collection of URLs linking to related resources or documentation.
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
     * The timestamp when the batch request was initially made.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
