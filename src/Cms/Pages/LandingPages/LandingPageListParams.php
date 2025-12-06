<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\LandingPages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the list of landing pages. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
 *
 * @see HubspotSDK\Services\Cms\Pages\LandingPagesService::list()
 *
 * @phpstan-type LandingPageListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   createdAfter?: \DateTimeInterface,
 *   createdAt?: \DateTimeInterface,
 *   createdBefore?: \DateTimeInterface,
 *   limit?: int,
 *   property?: string,
 *   sort?: list<string>,
 *   updatedAfter?: \DateTimeInterface,
 *   updatedAt?: \DateTimeInterface,
 *   updatedBefore?: \DateTimeInterface,
 * }
 */
final class LandingPageListParams implements BaseModel
{
    /** @use SdkModel<LandingPageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Specifies whether to return deleted Landing Pages. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Only return Landing Pages created after the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Only return Landing Pages created at exactly the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Only return Landing Pages created before the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdBefore;

    /**
     * The maximum number of results to return. Default is 100.
     */
    #[Api(optional: true)]
    public ?int $limit;

    #[Api(optional: true)]
    public ?string $property;

    /**
     * Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * Only return Landing Pages last updated after the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Only return Landing Pages last updated at exactly the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Only return Landing Pages last updated before the specified time.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedBefore;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $sort
     */
    public static function with(
        ?string $after = null,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAfter = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdBefore = null,
        ?int $limit = null,
        ?string $property = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $archived && $obj['archived'] = $archived;
        null !== $createdAfter && $obj['createdAfter'] = $createdAfter;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $createdBefore && $obj['createdBefore'] = $createdBefore;
        null !== $limit && $obj['limit'] = $limit;
        null !== $property && $obj['property'] = $property;
        null !== $sort && $obj['sort'] = $sort;
        null !== $updatedAfter && $obj['updatedAfter'] = $updatedAfter;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $updatedBefore && $obj['updatedBefore'] = $updatedBefore;

        return $obj;
    }

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    /**
     * Specifies whether to return deleted Landing Pages. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * Only return Landing Pages created after the specified time.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $obj = clone $this;
        $obj['createdAfter'] = $createdAfter;

        return $obj;
    }

    /**
     * Only return Landing Pages created at exactly the specified time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Only return Landing Pages created before the specified time.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $obj = clone $this;
        $obj['createdBefore'] = $createdBefore;

        return $obj;
    }

    /**
     * The maximum number of results to return. Default is 100.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }

    /**
     * Specifies which fields to use for sorting results. Valid fields are `name`, `createdAt`, `updatedAt`, `createdBy`, `updatedBy`. `createdAt` will be used by default.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Only return Landing Pages last updated after the specified time.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $obj = clone $this;
        $obj['updatedAfter'] = $updatedAfter;

        return $obj;
    }

    /**
     * Only return Landing Pages last updated at exactly the specified time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Only return Landing Pages last updated before the specified time.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $obj = clone $this;
        $obj['updatedBefore'] = $updatedBefore;

        return $obj;
    }
}
