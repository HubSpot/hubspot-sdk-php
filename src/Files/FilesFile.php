<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\FilesFile\Access;

/**
 * @phpstan-type files_file = array{
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
final class FilesFile implements BaseModel
{
    /** @use SdkModel<files_file> */
    use SdkModel;

    #[Api]
    public string $id;

    /** @var value-of<Access> $access */
    #[Api(enum: Access::class)]
    public string $access;

    #[Api]
    public bool $archived;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    #[Api('defaultHostingUrl', optional: true)]
    public ?string $defaultHostingURL;

    #[Api(optional: true)]
    public ?string $encoding;

    #[Api(optional: true)]
    public ?int $expiresAt;

    #[Api(optional: true)]
    public ?string $extension;

    #[Api(optional: true)]
    public ?string $fileMd5;

    #[Api(optional: true)]
    public ?int $height;

    #[Api(optional: true)]
    public ?bool $isUsableInContent;

    #[Api(optional: true)]
    public ?string $name;

    #[Api('parentFolderId', optional: true)]
    public ?string $parentFolderID;

    #[Api(optional: true)]
    public ?string $path;

    #[Api(optional: true)]
    public ?int $size;

    #[Api(optional: true)]
    public ?string $sourceGroup;

    #[Api(optional: true)]
    public ?string $type;

    #[Api(optional: true)]
    public ?string $url;

    #[Api(optional: true)]
    public ?int $width;

    /**
     * `new FilesFile()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilesFile::with(
     *   id: ..., access: ..., archived: ..., createdAt: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilesFile)
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
        $obj->access = $access instanceof Access ? $access->value : $access;
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

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * @param Access|value-of<Access> $access
     */
    public function withAccess(Access|string $access): self
    {
        $obj = clone $this;
        $obj->access = $access instanceof Access ? $access->value : $access;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    public function withDefaultHostingURL(string $defaultHostingURL): self
    {
        $obj = clone $this;
        $obj->defaultHostingURL = $defaultHostingURL;

        return $obj;
    }

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

    public function withExtension(string $extension): self
    {
        $obj = clone $this;
        $obj->extension = $extension;

        return $obj;
    }

    public function withFileMd5(string $fileMd5): self
    {
        $obj = clone $this;
        $obj->fileMd5 = $fileMd5;

        return $obj;
    }

    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $obj = clone $this;
        $obj->isUsableInContent = $isUsableInContent;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderID = $parentFolderID;

        return $obj;
    }

    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }

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

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    public function withWidth(int $width): self
    {
        $obj = clone $this;
        $obj->width = $width;

        return $obj;
    }
}
