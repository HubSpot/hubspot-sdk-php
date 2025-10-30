<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Domains;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Returns all existing domains that have been created. Results can be limited and filtered by creation or updated date.
 *
 * @see HubspotSDK\Cms\Domains->list
 *
 * @phpstan-type DomainListParamsShape = array{
 *   after?: string,
 *   archived?: bool,
 *   createdAfter?: \DateTimeInterface,
 *   createdAt?: \DateTimeInterface,
 *   createdBefore?: \DateTimeInterface,
 *   limit?: int,
 *   sort?: list<string>,
 *   updatedAfter?: \DateTimeInterface,
 *   updatedAt?: \DateTimeInterface,
 *   updatedBefore?: \DateTimeInterface,
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
    #[Api(optional: true)]
    public ?string $after;

    /**
     * Whether to return only results that have been archived.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Only return domains created after this date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAfter;

    /**
     * Only return domains created at this date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Only return domains created before this date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdBefore;

    /**
     * Maximum number of results per page.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /** @var list<string>|null $sort */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * Only return domains updated after this date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAfter;

    /**
     * Only return domains updated at this date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Only return domains updated before this date.
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
        ?array $sort = null,
        ?\DateTimeInterface $updatedAfter = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedBefore = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $archived && $obj->archived = $archived;
        null !== $createdAfter && $obj->createdAfter = $createdAfter;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdBefore && $obj->createdBefore = $createdBefore;
        null !== $limit && $obj->limit = $limit;
        null !== $sort && $obj->sort = $sort;
        null !== $updatedAfter && $obj->updatedAfter = $updatedAfter;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedBefore && $obj->updatedBefore = $updatedBefore;

        return $obj;
    }

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Only return domains created after this date.
     */
    public function withCreatedAfter(\DateTimeInterface $createdAfter): self
    {
        $obj = clone $this;
        $obj->createdAfter = $createdAfter;

        return $obj;
    }

    /**
     * Only return domains created at this date.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Only return domains created before this date.
     */
    public function withCreatedBefore(\DateTimeInterface $createdBefore): self
    {
        $obj = clone $this;
        $obj->createdBefore = $createdBefore;

        return $obj;
    }

    /**
     * Maximum number of results per page.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }

    /**
     * Only return domains updated after this date.
     */
    public function withUpdatedAfter(\DateTimeInterface $updatedAfter): self
    {
        $obj = clone $this;
        $obj->updatedAfter = $updatedAfter;

        return $obj;
    }

    /**
     * Only return domains updated at this date.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Only return domains updated before this date.
     */
    public function withUpdatedBefore(\DateTimeInterface $updatedBefore): self
    {
        $obj = clone $this;
        $obj->updatedBefore = $updatedBefore;

        return $obj;
    }
}
