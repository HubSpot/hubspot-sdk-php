<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\File\Access;

/**
 * File.
 *
 * @phpstan-type FileShape = array{
 *   id: string,
 *   access: Access|value-of<Access>,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface|null,
 *   defaultHostingURL?: string|null,
 *   encoding?: string|null,
 *   expiresAt?: int|null,
 *   extension?: string|null,
 *   fileMd5?: string|null,
 *   height?: int|null,
 *   isUsableInContent?: bool|null,
 *   name?: string|null,
 *   parentFolderID?: string|null,
 *   path?: string|null,
 *   size?: int|null,
 *   sourceGroup?: string|null,
 *   type?: string|null,
 *   url?: string|null,
 *   width?: int|null,
 * }
 */
final class File implements BaseModel
{
    /** @use SdkModel<FileShape> */
    use SdkModel;

    /**
     * File ID.
     */
    #[Required]
    public string $id;

    /**
     * File access. Can be PUBLIC_INDEXABLE, PUBLIC_NOT_INDEXABLE, PRIVATE.
     *
     * @var value-of<Access> $access
     */
    #[Required(enum: Access::class)]
    public string $access;

    /**
     * If the file is deleted.
     */
    #[Required]
    public bool $archived;

    /**
     * Creation time of the file object.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Timestamp of the latest update to the file.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Deletion time of the file object.
     */
    #[Optional]
    public ?\DateTimeInterface $archivedAt;

    /**
     * Default hosting URL of the file. This will use one of HubSpot's provided URLs to serve the file.
     */
    #[Optional('defaultHostingUrl')]
    public ?string $defaultHostingURL;

    /**
     * Encoding of the file.
     */
    #[Optional]
    public ?string $encoding;

    #[Optional]
    public ?int $expiresAt;

    /**
     * Extension of the file. ex: .jpg, .png, .gif, .pdf, etc.
     */
    #[Optional]
    public ?string $extension;

    /**
     * The MD5 hash of the file.
     */
    #[Optional]
    public ?string $fileMd5;

    /**
     * For image and video files, the height of the content.
     */
    #[Optional]
    public ?int $height;

    /**
     * Previously "archied". Indicates if the file should be used when creating new content like web pages.
     */
    #[Optional]
    public ?bool $isUsableInContent;

    /**
     * Name of the file.
     */
    #[Optional]
    public ?string $name;

    /**
     * ID of the folder the file is in.
     */
    #[Optional('parentFolderId')]
    public ?string $parentFolderID;

    /**
     * Path of the file in the file manager.
     */
    #[Optional]
    public ?string $path;

    /**
     * Size of the file in bytes.
     */
    #[Optional]
    public ?int $size;

    #[Optional]
    public ?string $sourceGroup;

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    #[Optional]
    public ?string $type;

    /**
     * URL of the given file. This URL can change depending on the domain settings of the account. Will use the select file hosting domain.
     */
    #[Optional]
    public ?string $url;

    /**
     * For image and video files, the width of the content.
     */
    #[Optional]
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
        $self = new self;

        $self['id'] = $id;
        $self['access'] = $access;
        $self['archived'] = $archived;
        $self['createdAt'] = $createdAt;
        $self['updatedAt'] = $updatedAt;

        null !== $archivedAt && $self['archivedAt'] = $archivedAt;
        null !== $defaultHostingURL && $self['defaultHostingURL'] = $defaultHostingURL;
        null !== $encoding && $self['encoding'] = $encoding;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $extension && $self['extension'] = $extension;
        null !== $fileMd5 && $self['fileMd5'] = $fileMd5;
        null !== $height && $self['height'] = $height;
        null !== $isUsableInContent && $self['isUsableInContent'] = $isUsableInContent;
        null !== $name && $self['name'] = $name;
        null !== $parentFolderID && $self['parentFolderID'] = $parentFolderID;
        null !== $path && $self['path'] = $path;
        null !== $size && $self['size'] = $size;
        null !== $sourceGroup && $self['sourceGroup'] = $sourceGroup;
        null !== $type && $self['type'] = $type;
        null !== $url && $self['url'] = $url;
        null !== $width && $self['width'] = $width;

        return $self;
    }

    /**
     * File ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * File access. Can be PUBLIC_INDEXABLE, PUBLIC_NOT_INDEXABLE, PRIVATE.
     *
     * @param Access|value-of<Access> $access
     */
    public function withAccess(Access|string $access): self
    {
        $self = clone $this;
        $self['access'] = $access;

        return $self;
    }

    /**
     * If the file is deleted.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Creation time of the file object.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Timestamp of the latest update to the file.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Deletion time of the file object.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * Default hosting URL of the file. This will use one of HubSpot's provided URLs to serve the file.
     */
    public function withDefaultHostingURL(string $defaultHostingURL): self
    {
        $self = clone $this;
        $self['defaultHostingURL'] = $defaultHostingURL;

        return $self;
    }

    /**
     * Encoding of the file.
     */
    public function withEncoding(string $encoding): self
    {
        $self = clone $this;
        $self['encoding'] = $encoding;

        return $self;
    }

    public function withExpiresAt(int $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Extension of the file. ex: .jpg, .png, .gif, .pdf, etc.
     */
    public function withExtension(string $extension): self
    {
        $self = clone $this;
        $self['extension'] = $extension;

        return $self;
    }

    /**
     * The MD5 hash of the file.
     */
    public function withFileMd5(string $fileMd5): self
    {
        $self = clone $this;
        $self['fileMd5'] = $fileMd5;

        return $self;
    }

    /**
     * For image and video files, the height of the content.
     */
    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    /**
     * Previously "archied". Indicates if the file should be used when creating new content like web pages.
     */
    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $self = clone $this;
        $self['isUsableInContent'] = $isUsableInContent;

        return $self;
    }

    /**
     * Name of the file.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * ID of the folder the file is in.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }

    /**
     * Path of the file in the file manager.
     */
    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }

    /**
     * Size of the file in bytes.
     */
    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    public function withSourceGroup(string $sourceGroup): self
    {
        $self = clone $this;
        $self['sourceGroup'] = $sourceGroup;

        return $self;
    }

    /**
     * Type of the file. Can be IMG, DOCUMENT, AUDIO, MOVIE, or OTHER.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * URL of the given file. This URL can change depending on the domain settings of the account. Will use the select file hosting domain.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * For image and video files, the width of the content.
     */
    public function withWidth(int $width): self
    {
        $self = clone $this;
        $self['width'] = $width;

        return $self;
    }
}
