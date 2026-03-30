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
     * New name. If specified the folder's name and fullPath will change. All children of the folder will be updated accordingly.
     */
    #[Optional]
    public ?string $name;

    /**
     * New parent folderId. If changed, the folder and all it's children will be moved into the specified folder. parentFolderId and parentFolderPath cannot be specified at the same time.
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
     * New name. If specified the folder's name and fullPath will change. All children of the folder will be updated accordingly.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * New parent folderId. If changed, the folder and all it's children will be moved into the specified folder. parentFolderId and parentFolderPath cannot be specified at the same time.
     */
    public function withParentFolderID(int $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }
}
