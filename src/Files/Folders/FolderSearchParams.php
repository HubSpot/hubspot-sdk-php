<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Api;
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
 *   parentFolderIds?: list<int>,
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
    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?string $before;

    /**
     * Search folders by exact time of creation. Time must be epoch time in milliseconds.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Search folders by greater than or equal to time of creation. Can be used with createdAtLte to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAtGte;

    /**
     * Search folders by less than or equal to time of creation. Can be used with createdAtGte to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAtLte;

    #[Api(optional: true)]
    public ?int $idGte;

    #[Api(optional: true)]
    public ?int $idLte;

    /** @var list<int>|null $ids */
    #[Api(list: 'int', optional: true)]
    public ?array $ids;

    /**
     * Number of items to return. Default limit is 10, maximum limit is 100.
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Search for folders containing the specified name.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Search folders with the given parent folderId.
     *
     * @var list<int>|null $parentFolderIds
     */
    #[Api(list: 'int', optional: true)]
    public ?array $parentFolderIds;

    /**
     * Search folders by path.
     */
    #[Api(optional: true)]
    public ?string $path;

    /**
     * Properties that should be included in the returned folders.
     *
     * @var list<string>|null $properties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    /**
     * Sort results by given property. For example -name sorts by name field descending, name sorts by name field ascending.
     *
     * @var list<string>|null $sort
     */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    /**
     * Search folders by exact time of latest updated. Time must be epoch time in milliseconds.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Search folders by greater than or equal to time of latest update. Can be used with updatedAtLte to create a range.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAtGte;

    /**
     * Search folders by less than or equal to time of latest update. Can be used with updatedAtGte to create a range.
     */
    #[Api(optional: true)]
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
     * @param list<int> $parentFolderIds
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
        ?array $parentFolderIds = null,
        ?string $path = null,
        ?array $properties = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedAtGte = null,
        ?\DateTimeInterface $updatedAtLte = null,
    ): self {
        $obj = new self;

        null !== $after && $obj->after = $after;
        null !== $before && $obj->before = $before;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdAtGte && $obj->createdAtGte = $createdAtGte;
        null !== $createdAtLte && $obj->createdAtLte = $createdAtLte;
        null !== $idGte && $obj->idGte = $idGte;
        null !== $idLte && $obj->idLte = $idLte;
        null !== $ids && $obj->ids = $ids;
        null !== $limit && $obj->limit = $limit;
        null !== $name && $obj->name = $name;
        null !== $parentFolderIds && $obj->parentFolderIds = $parentFolderIds;
        null !== $path && $obj->path = $path;
        null !== $properties && $obj->properties = $properties;
        null !== $sort && $obj->sort = $sort;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedAtGte && $obj->updatedAtGte = $updatedAtGte;
        null !== $updatedAtLte && $obj->updatedAtLte = $updatedAtLte;

        return $obj;
    }

    /**
     * Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj->after = $after;

        return $obj;
    }

    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj->before = $before;

        return $obj;
    }

    /**
     * Search folders by exact time of creation. Time must be epoch time in milliseconds.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Search folders by greater than or equal to time of creation. Can be used with createdAtLte to create a range.
     */
    public function withCreatedAtGte(\DateTimeInterface $createdAtGte): self
    {
        $obj = clone $this;
        $obj->createdAtGte = $createdAtGte;

        return $obj;
    }

    /**
     * Search folders by less than or equal to time of creation. Can be used with createdAtGte to create a range.
     */
    public function withCreatedAtLte(\DateTimeInterface $createdAtLte): self
    {
        $obj = clone $this;
        $obj->createdAtLte = $createdAtLte;

        return $obj;
    }

    public function withIDGte(int $idGte): self
    {
        $obj = clone $this;
        $obj->idGte = $idGte;

        return $obj;
    }

    public function withIDLte(int $idLte): self
    {
        $obj = clone $this;
        $obj->idLte = $idLte;

        return $obj;
    }

    /**
     * @param list<int> $ids
     */
    public function withIDs(array $ids): self
    {
        $obj = clone $this;
        $obj->ids = $ids;

        return $obj;
    }

    /**
     * Number of items to return. Default limit is 10, maximum limit is 100.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Search for folders containing the specified name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Search folders with the given parent folderId.
     *
     * @param list<int> $parentFolderIDs
     */
    public function withParentFolderIDs(array $parentFolderIDs): self
    {
        $obj = clone $this;
        $obj->parentFolderIds = $parentFolderIDs;

        return $obj;
    }

    /**
     * Search folders by path.
     */
    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }

    /**
     * Properties that should be included in the returned folders.
     *
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * Sort results by given property. For example -name sorts by name field descending, name sorts by name field ascending.
     *
     * @param list<string> $sort
     */
    public function withSort(array $sort): self
    {
        $obj = clone $this;
        $obj->sort = $sort;

        return $obj;
    }

    /**
     * Search folders by exact time of latest updated. Time must be epoch time in milliseconds.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Search folders by greater than or equal to time of latest update. Can be used with updatedAtLte to create a range.
     */
    public function withUpdatedAtGte(\DateTimeInterface $updatedAtGte): self
    {
        $obj = clone $this;
        $obj->updatedAtGte = $updatedAtGte;

        return $obj;
    }

    /**
     * Search folders by less than or equal to time of latest update. Can be used with updatedAtGte to create a range.
     */
    public function withUpdatedAtLte(\DateTimeInterface $updatedAtLte): self
    {
        $obj = clone $this;
        $obj->updatedAtLte = $updatedAtLte;

        return $obj;
    }
}
