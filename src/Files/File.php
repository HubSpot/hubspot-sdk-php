<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\File\Access;

/**
 * File.
 *
 * @phpstan-type file_alias = array{
 *   id: string,
 *   access: value-of<Access>,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface,
 *   defaultHostingURL?: string,
 *   encoding?: string,
 *   expiresAt?: int,
 *   extension?: string,
 *   fileMd5?: string,
 *   height?: int,
 *   isUsableInContent?: bool,
 *   name?: string,
 *   parentFolderID?: string,
 *   path?: string,
 *   size?: int,
 *   sourceGroup?: string,
 *   type?: string,
 *   url?: string,
 *   width?: int,
 * }
 */
final class File implements BaseModel
{
    /** @use SdkModel<file_alias> */
    use SdkModel;

    /**
     * File ID.
     */
    #[Api]
    public string $id;

    /**
     * File access. Can be PUBLIC_INDEXABLE, PUBLIC_NOT_INDEXABLE, PRIVATE.
     *
     * @var value-of<Access> $access
     */
    #[Api(enum: Access::class)]
    public string $access;

    /**
     * If the file is deleted.
     */
    #[Api]
    public bool $archived;

    /**
     * Creation time of the file object.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Timestamp of the latest update to the file.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * Deletion time of the file object.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /**
     * Default hosting URL of the file. This will use one of HubSpot's provided URLs to serve the file.
     */
    #[Api('defaultHostingUrl', optional: true)]
    public ?string $defaultHostingURL;

    /**
     * Encoding of the file.
     */
    #[Api(optional: true)]
    public ?string $encoding;

    #[Api(optional: true)]
    public ?int $expiresAt;

    /**
     * Extension of the file. ex: .jpg, .png, .gif, .pdf, etc.
     */
    #[Api(optional: true)]
    public ?string $extension;

    /**
     * The MD5 hash of the file.
     */
    #[Api(optional: true)]
    public ?string $fileMd5;

    /**
     * For image and video files, the height of the content.
     */
    #[Api(optional: true)]
    public ?int $height;

    /**
     * Previously "archied". Indicates if the file should be used when creating new content like web pages.
     */
    #[Api(optional: true)]
    public ?bool $isUsableInContent;

    /**
     * Name of the file.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * ID of the folder the file is in.
     */
    #[Api('parentFolderId', optional: true)]
    public ?string $parentFolderID;

    /**
     * Path of the file in the file manager.
     */
    #[Api(optional: true)]
    public ?string $path;

    /**
     * Size of the file in bytes.
     */
    #[Api(optional: true)]
    public ?int $size;

    #[Api(optional: true)]
    public ?string $sourceGroup;

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    #[Api(optional: true)]
    public ?string $type;

    /**
     * URL of the given file. This URL can change depending on the domain settings of the account. Will use the select file hosting domain.
     */
    #[Api(optional: true)]
    public ?string $url;

    /**
     * For image and video files, the width of the content.
     */
    #[Api(optional: true)]
    public ?int $width;

    /**
     * `new File()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * File::with(id: ..., access: ..., archived: ..., createdAt: ..., updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new File)
     *   ->withID(...)
     *   ->withAccess(...)
     *   ->withArchived(...)
     *   ->withCreatedAt(...)
     *   ->withUpdatedAt(...)
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
     * @param Access|value-of<Access> $access
     */
    public static function with(
        string $id,
        Access|string $access,
        bool $archived,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $archivedAt = null,
        ?string $defaultHostingURL = null,
        ?string $encoding = null,
        ?int $expiresAt = null,
        ?string $extension = null,
        ?string $fileMd5 = null,
        ?int $height = null,
        ?bool $isUsableInContent = null,
        ?string $name = null,
        ?string $parentFolderID = null,
        ?string $path = null,
        ?int $size = null,
        ?string $sourceGroup = null,
        ?string $type = null,
        ?string $url = null,
        ?int $width = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj['access'] = $access;
        $obj->archived = $archived;
        $obj->createdAt = $createdAt;
        $obj->updatedAt = $updatedAt;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $defaultHostingURL && $obj->defaultHostingURL = $defaultHostingURL;
        null !== $encoding && $obj->encoding = $encoding;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $extension && $obj->extension = $extension;
        null !== $fileMd5 && $obj->fileMd5 = $fileMd5;
        null !== $height && $obj->height = $height;
        null !== $isUsableInContent && $obj->isUsableInContent = $isUsableInContent;
        null !== $name && $obj->name = $name;
        null !== $parentFolderID && $obj->parentFolderID = $parentFolderID;
        null !== $path && $obj->path = $path;
        null !== $size && $obj->size = $size;
        null !== $sourceGroup && $obj->sourceGroup = $sourceGroup;
        null !== $type && $obj->type = $type;
        null !== $url && $obj->url = $url;
        null !== $width && $obj->width = $width;

        return $obj;
    }

    /**
     * File ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * File access. Can be PUBLIC_INDEXABLE, PUBLIC_NOT_INDEXABLE, PRIVATE.
     *
     * @param Access|value-of<Access> $access
     */
    public function withAccess(Access|string $access): self
    {
        $obj = clone $this;
        $obj['access'] = $access;

        return $obj;
    }

    /**
     * If the file is deleted.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * Creation time of the file object.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Timestamp of the latest update to the file.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Deletion time of the file object.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    /**
     * Default hosting URL of the file. This will use one of HubSpot's provided URLs to serve the file.
     */
    public function withDefaultHostingURL(string $defaultHostingURL): self
    {
        $obj = clone $this;
        $obj->defaultHostingURL = $defaultHostingURL;

        return $obj;
    }

    /**
     * Encoding of the file.
     */
    public function withEncoding(string $encoding): self
    {
        $obj = clone $this;
        $obj->encoding = $encoding;

        return $obj;
    }

    public function withExpiresAt(int $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * Extension of the file. ex: .jpg, .png, .gif, .pdf, etc.
     */
    public function withExtension(string $extension): self
    {
        $obj = clone $this;
        $obj->extension = $extension;

        return $obj;
    }

    /**
     * The MD5 hash of the file.
     */
    public function withFileMd5(string $fileMd5): self
    {
        $obj = clone $this;
        $obj->fileMd5 = $fileMd5;

        return $obj;
    }

    /**
     * For image and video files, the height of the content.
     */
    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    /**
     * Previously "archied". Indicates if the file should be used when creating new content like web pages.
     */
    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $obj = clone $this;
        $obj->isUsableInContent = $isUsableInContent;

        return $obj;
    }

    /**
     * Name of the file.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * ID of the folder the file is in.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderID = $parentFolderID;

        return $obj;
    }

    /**
     * Path of the file in the file manager.
     */
    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }

    /**
     * Size of the file in bytes.
     */
    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj->size = $size;

        return $obj;
    }

    public function withSourceGroup(string $sourceGroup): self
    {
        $obj = clone $this;
        $obj->sourceGroup = $sourceGroup;

        return $obj;
    }

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * URL of the given file. This URL can change depending on the domain settings of the account. Will use the select file hosting domain.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * For image and video files, the width of the content.
     */
    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }
}
