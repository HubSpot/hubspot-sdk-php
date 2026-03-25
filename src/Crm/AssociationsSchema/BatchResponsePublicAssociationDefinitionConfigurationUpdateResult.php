<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-import-type PublicAssociationDefinitionConfigurationUpdateResultShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionConfigurationUpdateResult
 * @phpstan-import-type StandardErrorShape from \HubspotSDK\StandardError
 *
 * @phpstan-type BatchResponsePublicAssociationDefinitionConfigurationUpdateResultShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicAssociationDefinitionConfigurationUpdateResult|PublicAssociationDefinitionConfigurationUpdateResultShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   errors?: list<StandardError|StandardErrorShape>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicAssociationDefinitionConfigurationUpdateResult implements BaseModel
{
    /**
     * @use SdkModel<BatchResponsePublicAssociationDefinitionConfigurationUpdateResultShape>
     */
    use SdkModel;

    /**
     * The date and time when the batch update operation was completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<PublicAssociationDefinitionConfigurationUpdateResult> $results */
    #[Required(list: PublicAssociationDefinitionConfigurationUpdateResult::class)]
    public array $results;

    /**
     * The date and time when the batch update operation started.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the batch update operation, which can be CANCELED, COMPLETE, PENDING, or PROCESSING.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * URLs linking to documentation or resources associated with the batch update operation.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The total number of errors encountered during the batch update operation.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * The date and time when the batch update operation was requested.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicAssociationDefinitionConfigurationUpdateResult()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicAssociationDefinitionConfigurationUpdateResult::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicAssociationDefinitionConfigurationUpdateResult)
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
     * @param list<PublicAssociationDefinitionConfigurationUpdateResult|PublicAssociationDefinitionConfigurationUpdateResultShape> $results
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
     * The date and time when the batch update operation was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param list<PublicAssociationDefinitionConfigurationUpdateResult|PublicAssociationDefinitionConfigurationUpdateResultShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The date and time when the batch update operation started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current status of the batch update operation, which can be CANCELED, COMPLETE, PENDING, or PROCESSING.
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
     * URLs linking to documentation or resources associated with the batch update operation.
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
     * The total number of errors encountered during the batch update operation.
     */
    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    /**
     * The date and time when the batch update operation was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
