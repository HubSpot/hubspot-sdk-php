<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\AssociationsSchema;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfiguration\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-import-type PublicAssociationDefinitionUserConfigurationShape from \HubspotSDK\Crm\AssociationsSchema\PublicAssociationDefinitionUserConfiguration
 * @phpstan-import-type StandardErrorShape from \HubspotSDK\StandardError
 *
 * @phpstan-type BatchResponsePublicAssociationDefinitionUserConfigurationShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<PublicAssociationDefinitionUserConfiguration|PublicAssociationDefinitionUserConfigurationShape>,
 *   startedAt: \DateTimeInterface,
 *   status: Status|value-of<Status>,
 *   errors?: list<StandardError|StandardErrorShape>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class BatchResponsePublicAssociationDefinitionUserConfiguration implements BaseModel
{
    /** @use SdkModel<BatchResponsePublicAssociationDefinitionUserConfigurationShape> */
    use SdkModel;

    /**
     * The date and time when the batch operation was completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /** @var list<PublicAssociationDefinitionUserConfiguration> $results */
    #[Required(list: PublicAssociationDefinitionUserConfiguration::class)]
    public array $results;

    /**
     * The date and time when the batch operation started.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the batch operation, which can be CANCELED, COMPLETE, PENDING, or PROCESSING.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /** @var list<StandardError>|null $errors */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * A collection of URLs linking to related documentation or resources associated with the batch operation.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The total number of errors encountered during the batch operation.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * The date and time when the batch operation was requested.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new BatchResponsePublicAssociationDefinitionUserConfiguration()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchResponsePublicAssociationDefinitionUserConfiguration::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchResponsePublicAssociationDefinitionUserConfiguration)
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
     * @param list<PublicAssociationDefinitionUserConfiguration|PublicAssociationDefinitionUserConfigurationShape> $results
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
     * The date and time when the batch operation was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    /**
     * @param list<PublicAssociationDefinitionUserConfiguration|PublicAssociationDefinitionUserConfigurationShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The date and time when the batch operation started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * The current status of the batch operation, which can be CANCELED, COMPLETE, PENDING, or PROCESSING.
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
     * A collection of URLs linking to related documentation or resources associated with the batch operation.
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
     * The total number of errors encountered during the batch operation.
     */
    public function withNumErrors(int $numErrors): self
    {
        $self = clone $this;
        $self['numErrors'] = $numErrors;

        return $self;
    }

    /**
     * The date and time when the batch operation was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $self = clone $this;
        $self['requestedAt'] = $requestedAt;

        return $self;
    }
}
