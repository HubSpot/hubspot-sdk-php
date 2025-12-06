<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Model definition for a content folder.
 *
 * @phpstan-type ContentFolderShape = array{
 *   id: string,
 *   category: int,
 *   created: \DateTimeInterface,
 *   deletedAt: \DateTimeInterface,
 *   name: string,
 *   parentFolderId: int,
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
    #[Api]
    public string $id;

    /**
     * The type of object this folder applies to. Should always be LANDING_PAGE.
     */
    #[Api]
    public int $category;

    #[Api]
    public \DateTimeInterface $created;

    /**
     * The timestamp (ISO8601 format) when this content folder was deleted.
     */
    #[Api]
    public \DateTimeInterface $deletedAt;

    /**
     * The name of the folder which will show up in the app dashboard.
     */
    #[Api]
    public string $name;

    /**
     * The ID of the content folder this folder is nested under.
     */
    #[Api]
    public int $parentFolderId;

    #[Api]
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
     *   parentFolderId: ...,
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
        int $parentFolderId,
        \DateTimeInterface $updated,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['category'] = $category;
        $obj['created'] = $created;
        $obj['deletedAt'] = $deletedAt;
        $obj['name'] = $name;
        $obj['parentFolderId'] = $parentFolderId;
        $obj['updated'] = $updated;

        return $obj;
    }

    /**
     * The unique ID of the content folder.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The type of object this folder applies to. Should always be LANDING_PAGE.
     */
    public function withCategory(int $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    public function withCreated(\DateTimeInterface $created): self
    {
        $obj = clone $this;
        $obj['created'] = $created;

        return $obj;
    }

    /**
     * The timestamp (ISO8601 format) when this content folder was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj['deletedAt'] = $deletedAt;

        return $obj;
    }

    /**
     * The name of the folder which will show up in the app dashboard.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The ID of the content folder this folder is nested under.
     */
    public function withParentFolderID(int $parentFolderID): self
    {
        $obj = clone $this;
        $obj['parentFolderId'] = $parentFolderID;

        return $obj;
    }

    public function withUpdated(\DateTimeInterface $updated): self
    {
        $obj = clone $this;
        $obj['updated'] = $updated;

        return $obj;
    }
}
