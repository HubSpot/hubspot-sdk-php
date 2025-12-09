<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicListFolderShape = array{
 *   id: string,
 *   childLists: list<int>,
 *   childNodes: list<mixed>,
 *   parentFolderID: string,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedContentsAt?: \DateTimeInterface|null,
 *   userID?: int|null,
 * }
 */
final class PublicListFolder implements BaseModel
{
    /** @use SdkModel<PublicListFolderShape> */
    use SdkModel;

    /**
     * The Id of the folder.
     */
    #[Required]
    public string $id;

    /**
     * An array of list Id's contained in this folder.
     *
     * @var list<int> $childLists
     */
    #[Required(list: 'int')]
    public array $childLists;

    /** @var list<mixed> $childNodes */
    #[Required(list: PublicListFolder::class)]
    public array $childNodes;

    /**
     * The Id of the folder this folder is in, the root folder is represented as 0.
     */
    #[Required('parentFolderId')]
    public string $parentFolderID;

    /**
     * The time the folder was created at.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * The name of the folder.
     */
    #[Optional]
    public ?string $name;

    /**
     * The time the folder was last updated at.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The time that the contents of the folder was last updated at.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedContentsAt;

    /**
     * The user Id of the owner of the folder.
     */
    #[Optional('userId')]
    public ?int $userID;

    /**
     * `new PublicListFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicListFolder::with(
     *   id: ..., childLists: ..., childNodes: ..., parentFolderID: ...
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
        string $parentFolderID,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedContentsAt = null,
        ?int $userID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['childLists'] = $childLists;
        $self['childNodes'] = $childNodes;
        $self['parentFolderID'] = $parentFolderID;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedContentsAt && $self['updatedContentsAt'] = $updatedContentsAt;
        null !== $userID && $self['userID'] = $userID;

        return $self;
    }

    /**
     * The Id of the folder.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * An array of list Id's contained in this folder.
     *
     * @param list<int> $childLists
     */
    public function withChildLists(array $childLists): self
    {
        $self = clone $this;
        $self['childLists'] = $childLists;

        return $self;
    }

    /**
     * @param list<mixed> $childNodes
     */
    public function withChildNodes(array $childNodes): self
    {
        $self = clone $this;
        $self['childNodes'] = $childNodes;

        return $self;
    }

    /**
     * The Id of the folder this folder is in, the root folder is represented as 0.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }

    /**
     * The time the folder was created at.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The name of the folder.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The time the folder was last updated at.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The time that the contents of the folder was last updated at.
     */
    public function withUpdatedContentsAt(
        \DateTimeInterface $updatedContentsAt
    ): self {
        $self = clone $this;
        $self['updatedContentsAt'] = $updatedContentsAt;

        return $self;
    }

    /**
     * The user Id of the owner of the folder.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }
}
