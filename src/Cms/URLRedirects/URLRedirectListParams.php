<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLRedirects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a list of URL redirects configured in your HubSpot account. This endpoint allows you to filter redirects based on their creation or update timestamps, and sort the results. It supports pagination and can include archived redirects if specified.
 *
 * @see HubspotSDK\Services\Cms\URLRedirectsService::list()
 *
 * @phpstan-type URLRedirectListParamsShape = array{
 *   after?: string|null,
 *   archived?: bool|null,
 *   createdAfter?: \DateTimeInterface|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdBefore?: \DateTimeInterface|null,
 *   limit?: int|null,
 *   sort?: list<string>|null,
 *   updatedAfter?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedBefore?: \DateTimeInterface|null,
 * }
 */
final class URLRedirectListParams implements BaseModel
{
    /** @use SdkModel<URLRedirectListParamsShape> */
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
     * Filter redirects created after a specific timestamp. Format must be date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Filter redirects by their exact creation timestamp. Format must be date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Filter redirects created before a specific timestamp. Format must be date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdBefore;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Specify the order in which to sort the results. Accepts an array of strings.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Filter redirects updated after a specific timestamp. Format must be date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Filter redirects by their exact update timestamp. Format must be date-time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Filter redirects updated before a specific timestamp. Format must be date-time.
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
     * Filter redirects created after a specific timestamp. Format must be date-time.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $self = clone $this;
        $self['createdAfter'] = $createdAfter;

        return $self;
    }

    /**
     * Filter redirects by their exact creation timestamp. Format must be date-time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Filter redirects created before a specific timestamp. Format must be date-time.
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
     * Specify the order in which to sort the results. Accepts an array of strings.
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
     * Filter redirects updated after a specific timestamp. Format must be date-time.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $self = clone $this;
        $self['updatedAfter'] = $updatedAfter;

        return $self;
    }

    /**
     * Filter redirects by their exact update timestamp. Format must be date-time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Filter redirects updated before a specific timestamp. Format must be date-time.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $self = clone $this;
        $self['updatedBefore'] = $updatedBefore;

        return $self;
    }
}
