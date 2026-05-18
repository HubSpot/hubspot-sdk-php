<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\SitePages;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all website pages. Supports paging and filtering. This method would be useful for an integration that examined these models and used an external service to suggest edits.
 *
 * @see HubSpotSDK\Services\Cms\Pages\SitePagesService::list()
 *
 * @phpstan-type SitePageListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   createdAfter?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdBefore?: \DateTimeInterface|null,
 *   limit?: int|null,
 *   property?: string|null,
 *   sort?: list<string>|null,
 *   updatedAfter?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedBefore?: \DateTimeInterface|null,
 * }
 */
final class SitePageListParams implements BaseModel
{
    /** @use SdkModel<SitePageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Filter pages created after a specific date and time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Filter pages by the exact creation timestamp. Format is date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Filter pages created before a specific date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdBefore;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Specify properties to include in the response.
     */
    #[Optional]
    public ?string $property;

    /**
     * Specify the order of results. Accepts an array of field names to sort by.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Filter pages updated after the specified date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Filter pages by their exact update timestamp in ISO 8601 format.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Filter pages updated before a specific date and time. Format should be date-time.
     */
    #[Optional]
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
     * @param list<string>|null $sort
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
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $archived && $self['archived'] = $archived;
        null !== $createdAfter && $self['createdAfter'] = $createdAfter;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdBefore && $self['createdBefore'] = $createdBefore;
        null !== $limit && $self['limit'] = $limit;
        null !== $property && $self['property'] = $property;
        null !== $sort && $self['sort'] = $sort;
        null !== $updatedAfter && $self['updatedAfter'] = $updatedAfter;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedBefore && $self['updatedBefore'] = $updatedBefore;

        return $self;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Filter pages created after a specific date and time.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $self = clone $this;
        $self['createdAfter'] = $createdAfter;

        return $self;
    }

    /**
     * Filter pages by the exact creation timestamp. Format is date-time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter pages created before a specific date-time.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $self = clone $this;
        $self['createdBefore'] = $createdBefore;

        return $self;
    }

    /**
     * The maximum number of results to display per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Specify properties to include in the response.
     */
    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * Specify the order of results. Accepts an array of field names to sort by.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    /**
     * Filter pages updated after the specified date-time.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $self = clone $this;
        $self['updatedAfter'] = $updatedAfter;

        return $self;
    }

    /**
     * Filter pages by their exact update timestamp in ISO 8601 format.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Filter pages updated before a specific date and time. Format should be date-time.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $self = clone $this;
        $self['updatedBefore'] = $updatedBefore;

        return $self;
    }
}
