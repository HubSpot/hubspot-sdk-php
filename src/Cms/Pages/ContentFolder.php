<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ContentFolderShape = array{
 *   id: string,
 *   category: int,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   name: string,
 *   parentFolderID: int,
 *   updated: \DateTimeInterface,
 * }
 */
final class ContentFolder implements BaseModel
{
    /** @use SdkModel<ContentFolderShape> */
    use SdkModel;

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
     * `new ContentFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContentFolder::with(
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
     * (new ContentFolder)
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
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['category'] = $category;
        $self['created'] = $created;
        $self['deletedAt'] = $deletedAt;
        $self['name'] = $name;
        $self['parentFolderID'] = $parentFolderID;
        $self['updated'] = $updated;

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
}
