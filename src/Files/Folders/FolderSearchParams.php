<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FolderSearchParams); // set properties as needed
 * $client->files.folders->search(...$params->toArray());
 * ```
 * Search folders.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->files.folders->search(...$params->toArray());`
 *
 * @see HubspotSDK\Files\Folders->search
 *
 * @phpstan-type folder_search_params = array{
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
    /** @use SdkModel<folder_search_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?string $after;

    #[Api(optional: true)]
    public ?string $before;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAtGte;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAtLte;

    #[Api(optional: true)]
    public ?int $idGte;

    #[Api(optional: true)]
    public ?int $idLte;

    /** @var list<int>|null $ids */
    #[Api(list: 'int', optional: true)]
    public ?array $ids;

    #[Api(optional: true)]
    public ?int $limit;

    #[Api(optional: true)]
    public ?string $name;

    /** @var list<int>|null $parentFolderIDs */
    #[Api(list: 'int', optional: true)]
    public ?array $parentFolderIDs;

    #[Api(optional: true)]
    public ?string $path;

    /** @var list<string>|null $properties */
    #[Api(list: 'string', optional: true)]
    public ?array $properties;

    /** @var list<string>|null $sort */
    #[Api(list: 'string', optional: true)]
    public ?array $sort;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAtGte;

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
        null !== $parentFolderIDs && $obj->parentFolderIDs = $parentFolderIDs;
        null !== $path && $obj->path = $path;
        null !== $properties && $obj->properties = $properties;
        null !== $sort && $obj->sort = $sort;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedAtGte && $obj->updatedAtGte = $updatedAtGte;
        null !== $updatedAtLte && $obj->updatedAtLte = $updatedAtLte;

        return $obj;
    }

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedAtGte(\DateTimeInterface $createdAtGte): self
    {
        $obj = clone $this;
        $obj->createdAtGte = $createdAtGte;

        return $obj;
    }

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

    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<int> $parentFolderIDs
     */
    public function withParentFolderIDs(array $parentFolderIDs): self
    {
        $obj = clone $this;
        $obj->parentFolderIDs = $parentFolderIDs;

        return $obj;
    }

    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }

    /**
     * @param list<string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUpdatedAtGte(\DateTimeInterface $updatedAtGte): self
    {
        $obj = clone $this;
        $obj->updatedAtGte = $updatedAtGte;

        return $obj;
    }

    public function withUpdatedAtLte(\DateTimeInterface $updatedAtLte): self
    {
        $obj = clone $this;
        $obj->updatedAtLte = $updatedAtLte;

        return $obj;
    }
}
