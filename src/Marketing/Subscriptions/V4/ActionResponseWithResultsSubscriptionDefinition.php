<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ErrorDetail;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinition;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsSubscriptionDefinition\Status;
use HubspotSDK\StandardError;

/**
 * @phpstan-type ActionResponseWithResultsSubscriptionDefinitionShape = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<SubscriptionDefinition>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<StandardError>|null,
 *   links?: array<string,string>|null,
 *   numErrors?: int|null,
 *   requestedAt?: \DateTimeInterface|null,
 * }
 */
final class ActionResponseWithResultsSubscriptionDefinition implements BaseModel
{
    /** @use SdkModel<ActionResponseWithResultsSubscriptionDefinitionShape> */
    use SdkModel;

    /**
     * The date and time when the operation was completed.
     */
    #[Required]
    public \DateTimeInterface $completedAt;

    /**
     * An array containing the results of the operation.
     *
     * @var list<SubscriptionDefinition> $results
     */
    #[Required(list: SubscriptionDefinition::class)]
    public array $results;

    /**
     * The date and time when the operation started.
     */
    #[Required]
    public \DateTimeInterface $startedAt;

    /**
     * The current status of the operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * An array of errors that occurred during the operation.
     *
     * @var list<StandardError>|null $errors
     */
    #[Optional(list: StandardError::class)]
    public ?array $errors;

    /**
     * A collection of related links associated with the operation.
     *
     * @var array<string,string>|null $links
     */
    #[Optional(map: 'string')]
    public ?array $links;

    /**
     * The number of errors encountered during the operation.
     */
    #[Optional]
    public ?int $numErrors;

    /**
     * The date and time when the operation was requested.
     */
    #[Optional]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new ActionResponseWithResultsSubscriptionDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionResponseWithResultsSubscriptionDefinition::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionResponseWithResultsSubscriptionDefinition)
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
     * @param list<SubscriptionDefinition|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   description: string,
     *   isActive: bool,
     *   isDefault: bool,
     *   isInternal: bool,
     *   name: string,
     *   updatedAt: \DateTimeInterface,
     *   businessUnitID?: int|null,
     *   communicationMethod?: string|null,
     *   purpose?: string|null,
     * }> $results
     * @param Status|value-of<Status> $status
     * @param list<StandardError|array{
     *   category: string,
     *   context: array<string,list<string>>,
     *   errors: list<ErrorDetail>,
     *   links: array<string,string>,
     *   message: string,
     *   status: string,
     *   id?: string|null,
     *   subCategory?: mixed,
     * }> $errors
     * @param array<string,string> $links
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
        $obj = new self;

        $obj['completedAt'] = $completedAt;
        $obj['results'] = $results;
        $obj['startedAt'] = $startedAt;
        $obj['status'] = $status;

        null !== $errors && $obj['errors'] = $errors;
        null !== $links && $obj['links'] = $links;
        null !== $numErrors && $obj['numErrors'] = $numErrors;
        null !== $requestedAt && $obj['requestedAt'] = $requestedAt;

        return $obj;
    }

    /**
     * The date and time when the operation was completed.
     */
    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj['completedAt'] = $completedAt;

        return $obj;
    }

    /**
     * An array containing the results of the operation.
     *
     * @param list<SubscriptionDefinition|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   description: string,
     *   isActive: bool,
     *   isDefault: bool,
     *   isInternal: bool,
     *   name: string,
     *   updatedAt: \DateTimeInterface,
     *   businessUnitID?: int|null,
     *   communicationMethod?: string|null,
     *   purpose?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * The date and time when the operation started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj['startedAt'] = $startedAt;

        return $obj;
    }

    /**
     * The current status of the operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * An array of errors that occurred during the operation.
     *
     * @param list<StandardError|array{
     *   category: string,
     *   context: array<string,list<string>>,
     *   errors: list<ErrorDetail>,
     *   links: array<string,string>,
     *   message: string,
     *   status: string,
     *   id?: string|null,
     *   subCategory?: mixed,
     * }> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
    }

    /**
     * A collection of related links associated with the operation.
     *
     * @param array<string,string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj['links'] = $links;

        return $obj;
    }

    /**
     * The number of errors encountered during the operation.
     */
    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj['numErrors'] = $numErrors;

        return $obj;
    }

    /**
     * The date and time when the operation was requested.
     */
    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj['requestedAt'] = $requestedAt;

        return $obj;
    }
}
