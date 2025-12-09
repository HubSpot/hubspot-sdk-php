<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FolderUpdateInputWithIDShape = array{
 *   id: string, name?: string|null, parentFolderID?: int|null
 * }
 */
final class FolderUpdateInputWithID implements BaseModel
{
    /** @use SdkModel<FolderUpdateInputWithIDShape> */
    use SdkModel;

    /**
     * The unique identifier of the folder to be updated.
     */
    #[Required]
    public string $id;

    /**
     * The new name for the folder, which will also update the fullPath and all children of the folder.
     */
    #[Optional]
    public ?string $name;

    /**
     * The ID of the new parent folder, which will move the folder and its children into the specified folder.
     */
    #[Optional('parentFolderId')]
    public ?int $parentFolderID;

    /**
     * `new FolderUpdateInputWithID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderUpdateInputWithID::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderUpdateInputWithID)->withID(...)
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
     */
    public static function with(
        string $id,
        ?string $name = null,
        ?int $parentFolderID = null
    ): self {
        $self = new self;

        $self['id'] = $id;

        null !== $name && $self['name'] = $name;
        null !== $parentFolderID && $self['parentFolderID'] = $parentFolderID;

        return $self;
    }

    /**
     * The unique identifier of the folder to be updated.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The new name for the folder, which will also update the fullPath and all children of the folder.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The ID of the new parent folder, which will move the folder and its children into the specified folder.
     */
    public function withParentFolderID(int $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }
}
