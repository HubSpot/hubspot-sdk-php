<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Search for folders. Does not contain hidden or archived folders.
 *
 * @see HubspotSDK\Services\Files\FoldersService::search()
 *
 * @phpstan-type FolderSearchParamsShape = array{
 *   after?: string,
 *   before?: string,
 *   createdAt?: \DateTimeInterface,
 *   createdAtGte?: \DateTimeInterface,
 *   createdAtLte?: \DateTimeInterface,
 *   idGte?: int,
 *   idLte?: int,
 *   ids?: list<int>,
 *   limit?: int,
 *   name?: string,
 *   parentFolderIDs?: list<int>,
 *   path?: string,
 *   properties?: list<string>,
 *   sort?: list<string>,
 *   updatedAt?: \DateTimeInterface,
 *   updatedAtGte?: \DateTimeInterface,
 *   updatedAtLte?: \DateTimeInterface,
 * }
 */
final class FolderSearchParams implements BaseModel
{
    /** @use SdkModel<FolderSearchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $before;

    /**
     * Search folders by exact time of creation. Time must be epoch time in milliseconds.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * Search folders by greater than or equal to time of creation. Can be used with createdAtLte to create a range.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAtGte;

    /**
     * Search folders by less than or equal to time of creation. Can be used with createdAtGte to create a range.
     */
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
     * Number of items to return. Default limit is 10, maximum limit is 100.
     */
    #[Optional]
    public ?int $limit;

    /**
     * Search for folders containing the specified name.
     */
    #[Optional]
    public ?string $name;

    /**
     * Search folders with the given parent folderId.
     *
     * @var list<int>|null $parentFolderIDs
     */
    #[Optional(list: 'int')]
    public ?array $parentFolderIDs;

    /**
     * Search folders by path.
     */
    #[Optional]
    public ?string $path;

    /**
     * Properties that should be included in the returned folders.
     *
     * @var list<string>|null $properties
     */
    #[Optional(list: 'string')]
    public ?array $properties;

    /**
     * Sort results by given property. For example -name sorts by name field descending, name sorts by name field ascending.
     *
     * @var list<string>|null $sort
     */
    #[Optional(list: 'string')]
    public ?array $sort;

    /**
     * Search folders by exact time of latest updated. Time must be epoch time in milliseconds.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Search folders by greater than or equal to time of latest update. Can be used with updatedAtLte to create a range.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAtGte;

    /**
     * Search folders by less than or equal to time of latest update. Can be used with updatedAtGte to create a range.
     */
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
     * @param list<int> $ids
     * @param list<int> $parentFolderIDs
     * @param list<string> $properties
     * @param list<string> $sort
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
     * Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
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

    /**
     * Search folders by exact time of creation. Time must be epoch time in milliseconds.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Search folders by greater than or equal to time of creation. Can be used with createdAtLte to create a range.
     */
    public function withCreatedAtGte(\DateTimeInterface $createdAtGte): self
    {
        $self = clone $this;
        $self['createdAtGte'] = $createdAtGte;

        return $self;
    }

    /**
     * Search folders by less than or equal to time of creation. Can be used with createdAtGte to create a range.
     */
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
     * Number of items to return. Default limit is 10, maximum limit is 100.
     */
    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Search for folders containing the specified name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Search folders with the given parent folderId.
     *
     * @param list<int> $parentFolderIDs
     */
    public function withParentFolderIDs(array $parentFolderIDs): self
    {
        $self = clone $this;
        $self['parentFolderIDs'] = $parentFolderIDs;

        return $self;
    }

    /**
     * Search folders by path.
     */
    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }

    /**
     * Properties that should be included in the returned folders.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * Sort results by given property. For example -name sorts by name field descending, name sorts by name field ascending.
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
     * Search folders by exact time of latest updated. Time must be epoch time in milliseconds.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Search folders by greater than or equal to time of latest update. Can be used with updatedAtLte to create a range.
     */
    public function withUpdatedAtGte(\DateTimeInterface $updatedAtGte): self
    {
        $self = clone $this;
        $self['updatedAtGte'] = $updatedAtGte;

        return $self;
    }

    /**
     * Search folders by less than or equal to time of latest update. Can be used with updatedAtGte to create a range.
     */
    public function withUpdatedAtLte(\DateTimeInterface $updatedAtLte): self
    {
        $self = clone $this;
        $self['updatedAtLte'] = $updatedAtLte;

        return $self;
    }
}
