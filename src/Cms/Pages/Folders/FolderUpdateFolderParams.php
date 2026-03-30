<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\Folders;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Partially update a landing page folder, specified by the folder ID. You only need to specify the details values that you are modifying.
 *
 * @see HubspotSDK\Services\Cms\Pages\FoldersService::updateFolder()
 *
 * @phpstan-type FolderUpdateFolderParamsShape = array{
 *   id: string,
 *   category: int,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   name: string,
 *   parentFolderID: int,
 *   updated: \DateTimeInterface,
 *   archived?: bool|null,
 * }
 */
final class FolderUpdateFolderParams implements BaseModel
{
    /** @use SdkModel<FolderUpdateFolderParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The unique ID of the content folder.
     */
    #[Required]
    public string $id;

    /**
     * The type of object this folder applies to. Should always be LANDING_PAGE.
     */
    #[Required]
    public int $category;

    /**
     * The timestamp indicating when the content folder was created.
     */
    #[Required]
    public \DateTimeInterface $created;

    /**
     * The timestamp (ISO8601 format) when this content folder was deleted.
     */
    #[Required]
    public \DateTimeInterface $deletedAt;

    /**
     * The name of the folder which will show up in the app dashboard.
     */
    #[Required]
    public string $name;

    /**
     * The ID of the content folder this folder is nested under.
     */
    #[Required('parentFolderId')]
    public int $parentFolderID;

    /**
     * The timestamp indicating when the content folder was last updated.
     */
    #[Required]
    public \DateTimeInterface $updated;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    /**
     * `new FolderUpdateFolderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderUpdateFolderParams::with(
     *   id: ...,
     *   category: ...,
     *   created: ...,
     *   deletedAt: ...,
     *   name: ...,
     *   parentFolderID: ...,
     *   updated: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderUpdateFolderParams)
     *   ->withID(...)
     *   ->withCategory(...)
     *   ->withCreated(...)
     *   ->withDeletedAt(...)
     *   ->withName(...)
     *   ->withParentFolderID(...)
     *   ->withUpdated(...)
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
        int $category,
        \DateTimeInterface $created,
        \DateTimeInterface $deletedAt,
        string $name,
        int $parentFolderID,
        \DateTimeInterface $updated,
        ?bool $archived = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['category'] = $category;
        $self['created'] = $created;
        $self['deletedAt'] = $deletedAt;
        $self['name'] = $name;
        $self['parentFolderID'] = $parentFolderID;
        $self['updated'] = $updated;

        null !== $archived && $self['archived'] = $archived;

        return $self;
    }

    /**
     * The unique ID of the content folder.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The type of object this folder applies to. Should always be LANDING_PAGE.
     */
    public function withCategory(int $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * The timestamp indicating when the content folder was created.
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this content folder was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * The name of the folder which will show up in the app dashboard.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The ID of the content folder this folder is nested under.
     */
    public function withParentFolderID(int $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }

    /**
     * The timestamp indicating when the content folder was last updated.
     */
    public function withUpdated(\DateTimeInterface $updated): self
    {
        $self = clone $this;
        $self['updated'] = $updated;

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
}
