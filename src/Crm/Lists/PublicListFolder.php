<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicListFolderShape = array{
 *   id: string,
 *   childLists: list<int>,
 *   childNodes: list<mixed>,
 *   parentFolderId: string,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedContentsAt?: \DateTimeInterface|null,
 *   userId?: int|null,
 * }
 */
final class PublicListFolder implements BaseModel
{
    /** @use SdkModel<PublicListFolderShape> */
    use SdkModel;

    /**
     * The Id of the folder.
     */
    #[Api]
    public string $id;

    /**
     * An array of list Id's contained in this folder.
     *
     * @var list<int> $childLists
     */
    #[Api(list: 'int')]
    public array $childLists;

    /** @var list<mixed> $childNodes */
    #[Api(list: PublicListFolder::class)]
    public array $childNodes;

    /**
     * The Id of the folder this folder is in, the root folder is represented as 0.
     */
    #[Api]
    public string $parentFolderId;

    /**
     * The time the folder was created at.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The name of the folder.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The time the folder was last updated at.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The time that the contents of the folder was last updated at.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedContentsAt;

    /**
     * The user Id of the owner of the folder.
     */
    #[Api(optional: true)]
    public ?int $userId;

    /**
     * `new PublicListFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicListFolder::with(
     *   id: ..., childLists: ..., childNodes: ..., parentFolderId: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicListFolder)
     *   ->withID(...)
     *   ->withChildLists(...)
     *   ->withChildNodes(...)
     *   ->withParentFolderID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $childLists
     * @param list<mixed> $childNodes
     */
    public static function with(
        string $id,
        array $childLists,
        array $childNodes,
        string $parentFolderId,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedContentsAt = null,
        ?int $userId = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['childLists'] = $childLists;
        $obj['childNodes'] = $childNodes;
        $obj['parentFolderId'] = $parentFolderId;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $name && $obj['name'] = $name;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $updatedContentsAt && $obj['updatedContentsAt'] = $updatedContentsAt;
        null !== $userId && $obj['userId'] = $userId;

        return $obj;
    }

    /**
     * The Id of the folder.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * An array of list Id's contained in this folder.
     *
     * @param list<int> $childLists
     */
    public function withChildLists(array $childLists): self
    {
        $obj = clone $this;
        $obj['childLists'] = $childLists;

        return $obj;
    }

    /**
     * @param list<mixed> $childNodes
     */
    public function withChildNodes(array $childNodes): self
    {
        $obj = clone $this;
        $obj['childNodes'] = $childNodes;

        return $obj;
    }

    /**
     * The Id of the folder this folder is in, the root folder is represented as 0.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj['parentFolderId'] = $parentFolderID;

        return $obj;
    }

    /**
     * The time the folder was created at.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The name of the folder.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The time the folder was last updated at.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The time that the contents of the folder was last updated at.
     */
    public function withUpdatedContentsAt(
        \DateTimeInterface $updatedContentsAt
    ): self {
        $obj = clone $this;
        $obj['updatedContentsAt'] = $updatedContentsAt;

        return $obj;
    }

    /**
     * The user Id of the owner of the folder.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }
}
