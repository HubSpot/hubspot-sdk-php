<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-import-type PublicCampaignWithAssetsShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets
 * @phpstan-import-type StandardErrorShape from \HubspotSDK\StandardError
 *
 * @phpstan-type BatchResponsePublicCampaignWithAssetsShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicCampaignWithAssets|PublicCampaignWithAssetsShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   errors?: list<StandardError|StandardErrorShape>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicCampaignWithAssets implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicCampaignWithAssetsShape> */
    use SdkModel;

    /**
     * The date and time when the batch operation was completed, in ISO 8601 format.
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
     * The date and time when the batch operation started, in ISO 8601 format.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the batch operation. Valid values include 'PENDING', 'PROCESSING', 'CANCELED', and 'COMPLETE'.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * An array of errors encountered during the batch operation, each described by a StandardError object.
     *
     * @var list<StandardError>|null $errors
     */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * A map of link names to associated URIs that provide additional information about the batch operation.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The number of errors encountered during the batch operation.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * The date and time when the batch operation was requested, in ISO 8601 format.
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
     * The date and time when the batch operation was completed, in ISO 8601 format.
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
     * The date and time when the batch operation started, in ISO 8601 format.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current status of the batch operation. Valid values include 'PENDING', 'PROCESSING', 'CANCELED', and 'COMPLETE'.
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
     * An array of errors encountered during the batch operation, each described by a StandardError object.
     *
     * @param list<StandardError|StandardErrorShape> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    /**
     * A map of link names to associated URIs that provide additional information about the batch operation.
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
     * The number of errors encountered during the batch operation.
     */
    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    /**
     * The date and time when the batch operation was requested, in ISO 8601 format.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
