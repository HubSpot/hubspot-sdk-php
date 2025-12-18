<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all blog posts, with paging and filtering options. This method would be useful for an integration that ingests posts and suggests edits.
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::list()
 *
 * @phpstan-type PostListParamsShape = array{
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
final class PostListParams implements BaseModel
{
    /** @use SdkModel<PostListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    /**
     * Specifies whether to return deleted blog posts. Defaults to `false`.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * Only return blog posts created after the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Only return blog posts created at exactly the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Only return blog posts created before the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $createdBefore;

    /**
     * The maximum number of results to return. Default is 20.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $property;

    /**
     * Specifies which fields to use for sorting results. Valid fields are `createdAt` (default), `name`, `updatedAt`, `createdBy`, `updatedBy`.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Only return blog posts last updated after the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Only return blog posts last updated at exactly the specified time.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Only return blog posts last updated before the specified time.
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
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }

    /**
     * Specifies whether to return deleted blog posts. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Only return blog posts created after the specified time.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $self = clone $this;
        $self['createdAfter'] = $createdAfter;

        return $self;
    }

    /**
     * Only return blog posts created at exactly the specified time.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Only return blog posts created before the specified time.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $self = clone $this;
        $self['createdBefore'] = $createdBefore;

        return $self;
    }

    /**
     * The maximum number of results to return. Default is 20.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    public function withProperty(string $property): self
    {
        $self = clone $this;
        $self['property'] = $property;

        return $self;
    }

    /**
     * Specifies which fields to use for sorting results. Valid fields are `createdAt` (default), `name`, `updatedAt`, `createdBy`, `updatedBy`.
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
     * Only return blog posts last updated after the specified time.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $self = clone $this;
        $self['updatedAfter'] = $updatedAfter;

        return $self;
    }

    /**
     * Only return blog posts last updated at exactly the specified time.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Only return blog posts last updated before the specified time.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $self = clone $this;
        $self['updatedBefore'] = $updatedBefore;

        return $self;
    }
}
