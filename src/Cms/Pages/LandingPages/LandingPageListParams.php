<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\LandingPages;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of landing pages in your HubSpot account. This endpoint allows you to filter landing pages based on creation and update timestamps, sort them, and paginate through results. You can also choose to include archived pages or specify certain properties to be included in the response.
 *
 * @see HubSpotSDK\Services\Cms\Pages\LandingPagesService::list()
 *
 * @phpstan-type LandingPageListParamsShape = array{
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
final class LandingPageListParams implements BaseModel
{
    /** @use SdkModel<LandingPageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * A cursor token for pagination. Use the value from the previous response's paging.next.after field.
     */
    #[Optional]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Filter landing pages created after a specific date and time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Filter landing pages by their creation timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Filter landing pages created before a specific date and time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdBefore;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Specify which properties of the landing pages to include in the response.
     */
    #[Optional]
    public ?string $property;

    /**
     * Specify the order in which results are returned. Accepts an array of strings.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Filter landing pages updated after a specific date and time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Filter landing pages by their last updated timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Filter landing pages updated before a specific date and time.
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
     * A cursor token for pagination. Use the value from the previous response's paging.next.after field.
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
     * Filter landing pages created after a specific date and time.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $self = clone $this;
        $self['createdAfter'] = $createdAfter;

        return $self;
    }

    /**
     * Filter landing pages by their creation timestamp.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter landing pages created before a specific date and time.
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
     * Specify which properties of the landing pages to include in the response.
     */
    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * Specify the order in which results are returned. Accepts an array of strings.
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
     * Filter landing pages updated after a specific date and time.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $self = clone $this;
        $self['updatedAfter'] = $updatedAfter;

        return $self;
    }

    /**
     * Filter landing pages by their last updated timestamp.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Filter landing pages updated before a specific date and time.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $self = clone $this;
        $self['updatedBefore'] = $updatedBefore;

        return $self;
    }
}
