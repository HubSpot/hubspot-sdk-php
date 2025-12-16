<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Domains;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns all existing domains that have been created. Results can be limited and filtered by creation or updated date.
 *
 * @see HubspotSDK\Services\Cms\DomainsService::list()
 *
 * @phpstan-type DomainListParamsShape = array{
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
final class DomainListParams implements BaseModel
{
    /** @use SdkModel<DomainListParamsShape> */
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
     * Only return domains created after this date.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Only return domains created at this date.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Only return domains created before this date.
     */
    #[Optional]
    public ?\DateTimeInterface $createdBefore;

    /**
     * Maximum number of results per page.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Specifies the order in which the domains are returned.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Only return domains updated after this date.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Only return domains updated at this date.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Only return domains updated before this date.
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
     * @param list<string> $sort
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
     * Only return domains created after this date.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $self = clone $this;
        $self['createdAfter'] = $createdAfter;

        return $self;
    }

    /**
     * Only return domains created at this date.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Only return domains created before this date.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $self = clone $this;
        $self['createdBefore'] = $createdBefore;

        return $self;
    }

    /**
     * Maximum number of results per page.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Specifies the order in which the domains are returned.
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
     * Only return domains updated after this date.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $self = clone $this;
        $self['updatedAfter'] = $updatedAfter;

        return $self;
    }

    /**
     * Only return domains updated at this date.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Only return domains updated before this date.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $self = clone $this;
        $self['updatedBefore'] = $updatedBefore;

        return $self;
    }
}
