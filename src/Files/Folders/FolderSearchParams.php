<?php

declare(strict_types=1);

namespace HubSpotSDK\Files\Folders;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Search for folders. Does not contain hidden or archived folders.
 *
 * @see HubSpotSDK\Services\Files\FoldersService::search()
 *
 * @phpstan-type FolderSearchParamsShape = array{
 *   after?: string|null,
 *   before?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdAtGte?: \DateTimeInterface|null,
 *   createdAtLte?: \DateTimeInterface|null,
 *   idGte?: int|null,
 *   idLte?: int|null,
 *   ids?: list<int>|null,
 *   limit?: int|null,
 *   name?: string|null,
 *   parentFolderIDs?: list<int>|null,
 *   path?: string|null,
 *   properties?: list<string>|null,
 *   sort?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedAtGte?: \DateTimeInterface|null,
 *   updatedAtLte?: \DateTimeInterface|null,
 * }
 */
final class FolderSearchParams implements BaseModel
{
    /** @use SdkModel<FolderSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $before;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?\DateTimeInterface $createdAtGte;

    #[Optional]
    public ?\DateTimeInterface $createdAtLte;

    #[Optional]
    public ?int $idGte;

    #[Optional]
    public ?int $idLte;

    /** @var list<int>|null $ids */
    #[Optional(list: 'int')]
    public ?array $ids;

    /**
     * The maximum number of results to display per page.
     */
    #[Optional]
    public ?int $limit;

    #[Optional]
    public ?string $name;

    /** @var list<int>|null $parentFolderIDs */
    #[Optional(list: 'int')]
    public ?array $parentFolderIDs;

    #[Optional]
    public ?string $path;

    /** @var list<string>|null $properties */
    #[Optional(list: 'string')]
    public ?array $properties;

    /** @var list<string>|null $sort */
    #[Optional(list: 'string')]
    public ?array $sort;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional]
    public ?\DateTimeInterface $updatedAtGte;

    #[Optional]
    public ?\DateTimeInterface $updatedAtLte;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int>|null $ids
     * @param list<int>|null $parentFolderIDs
     * @param list<string>|null $properties
     * @param list<string>|null $sort
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdAtGte = null,
        ?\DateTimeInterface $createdAtLte = null,
        ?int $idGte = null,
        ?int $idLte = null,
        ?array $ids = null,
        ?int $limit = null,
        ?string $name = null,
        ?array $parentFolderIDs = null,
        ?string $path = null,
        ?array $properties = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedAtGte = null,
        ?\DateTimeInterface $updatedAtLte = null,
    ): self {
        $self = new self;

        null !== $after && $self['after'] = $after;
        null !== $before && $self['before'] = $before;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdAtGte && $self['createdAtGte'] = $createdAtGte;
        null !== $createdAtLte && $self['createdAtLte'] = $createdAtLte;
        null !== $idGte && $self['idGte'] = $idGte;
        null !== $idLte && $self['idLte'] = $idLte;
        null !== $ids && $self['ids'] = $ids;
        null !== $limit && $self['limit'] = $limit;
        null !== $name && $self['name'] = $name;
        null !== $parentFolderIDs && $self['parentFolderIDs'] = $parentFolderIDs;
        null !== $path && $self['path'] = $path;
        null !== $properties && $self['properties'] = $properties;
        null !== $sort && $self['sort'] = $sort;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedAtGte && $self['updatedAtGte'] = $updatedAtGte;
        null !== $updatedAtLte && $self['updatedAtLte'] = $updatedAtLte;

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

    public function withBefore(string $before): self
    {
        $self = clone $this;
        $self['before'] = $before;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreatedAtGte(\DateTimeInterface $createdAtGte): self
    {
        $self = clone $this;
        $self['createdAtGte'] = $createdAtGte;

        return $self;
    }

    public function withCreatedAtLte(\DateTimeInterface $createdAtLte): self
    {
        $self = clone $this;
        $self['createdAtLte'] = $createdAtLte;

        return $self;
    }

    public function withIDGte(int $idGte): self
    {
        $self = clone $this;
        $self['idGte'] = $idGte;

        return $self;
    }

    public function withIDLte(int $idLte): self
    {
        $self = clone $this;
        $self['idLte'] = $idLte;

        return $self;
    }

    /**
     * @param list<int> $ids
     */
    public function withIDs(array $ids): self
    {
        $self = clone $this;
        $self['ids'] = $ids;

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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<int> $parentFolderIDs
     */
    public function withParentFolderIDs(array $parentFolderIDs): self
    {
        $self = clone $this;
        $self['parentFolderIDs'] = $parentFolderIDs;

        return $self;
    }

    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUpdatedAtGte(\DateTimeInterface $updatedAtGte): self
    {
        $self = clone $this;
        $self['updatedAtGte'] = $updatedAtGte;

        return $self;
    }

    public function withUpdatedAtLte(\DateTimeInterface $updatedAtLte): self
    {
        $self = clone $this;
        $self['updatedAtLte'] = $updatedAtLte;

        return $self;
    }
}
