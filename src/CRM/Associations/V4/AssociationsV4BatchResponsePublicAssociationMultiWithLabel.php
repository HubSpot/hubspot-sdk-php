<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\V4\AssociationsV4BatchResponsePublicAssociationMultiWithLabel\Status;

/**
 * @phpstan-type associations_v4_batch_response_public_association_multi_with_label = array{
 *   completedAt: \DateTimeInterface,
 *   results: list<AssociationsV4PublicAssociationMultiWithLabel>,
 *   startedAt: \DateTimeInterface,
 *   status: value-of<Status>,
 *   errors?: list<AssociationsV4StandardError1>,
 *   links?: array<string, string>,
 *   numErrors?: int,
 *   requestedAt?: \DateTimeInterface,
 * }
 */
final class AssociationsV4BatchResponsePublicAssociationMultiWithLabel implements BaseModel
{
    /**
     * @use SdkModel<associations_v4_batch_response_public_association_multi_with_label>
     */
    use SdkModel;

    #[Api]
    public \DateTimeInterface $completedAt;

    /** @var list<AssociationsV4PublicAssociationMultiWithLabel> $results */
    #[Api(list: AssociationsV4PublicAssociationMultiWithLabel::class)]
    public array $results;

    #[Api]
    public \DateTimeInterface $startedAt;

    /** @var value-of<Status> $status */
    #[Api(enum: Status::class)]
    public string $status;

    /** @var list<AssociationsV4StandardError1>|null $errors */
    #[Api(list: AssociationsV4StandardError1::class, optional: true)]
    public ?array $errors;

    /** @var array<string, string>|null $links */
    #[Api(map: 'string', optional: true)]
    public ?array $links;

    #[Api(optional: true)]
    public ?int $numErrors;

    #[Api(optional: true)]
    public ?\DateTimeInterface $requestedAt;

    /**
     * `new AssociationsV4BatchResponsePublicAssociationMultiWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4BatchResponsePublicAssociationMultiWithLabel::with(
     *   completedAt: ..., results: ..., startedAt: ..., status: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4BatchResponsePublicAssociationMultiWithLabel)
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
     * @param list<AssociationsV4PublicAssociationMultiWithLabel> $results
     * @param Status|value-of<Status> $status
     * @param list<AssociationsV4StandardError1> $errors
     * @param array<string, string> $links
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

        $obj->completedAt = $completedAt;
        $obj->results = $results;
        $obj->startedAt = $startedAt;
        $obj->status = $status instanceof Status ? $status->value : $status;

        null !== $errors && $obj->errors = $errors;
        null !== $links && $obj->links = $links;
        null !== $numErrors && $obj->numErrors = $numErrors;
        null !== $requestedAt && $obj->requestedAt = $requestedAt;

        return $obj;
    }

    public function withCompletedAt(\DateTimeInterface $completedAt): self
    {
        $obj = clone $this;
        $obj->completedAt = $completedAt;

        return $obj;
    }

    /**
     * @param list<AssociationsV4PublicAssociationMultiWithLabel> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $obj = clone $this;
        $obj->startedAt = $startedAt;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * @param list<AssociationsV4StandardError1> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    /**
     * @param array<string, string> $links
     */
    public function withLinks(array $links): self
    {
        $obj = clone $this;
        $obj->links = $links;

        return $obj;
    }

    public function withNumErrors(int $numErrors): self
    {
        $obj = clone $this;
        $obj->numErrors = $numErrors;

        return $obj;
    }

    public function withRequestedAt(\DateTimeInterface $requestedAt): self
    {
        $obj = clone $this;
        $obj->requestedAt = $requestedAt;

        return $obj;
    }
}
