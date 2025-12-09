<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\FileUpdateInput\Access;

/**
 * Object for updating files.
 *
 * @phpstan-type FileUpdateInputShape = array{
 *   access?: value-of<Access>|null,
 *   clearExpires?: bool|null,
 *   expiresAt?: \DateTimeInterface|null,
 *   isUsableInContent?: bool|null,
 *   name?: string|null,
 *   parentFolderID?: string|null,
 *   parentFolderPath?: string|null,
 * }
 */
final class FileUpdateInput implements BaseModel
{
    /** @use SdkModel<FileUpdateInputShape> */
    use SdkModel;

    /**
     * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     *
     * @var value-of<Access>|null $access
     */
    #[Optional(enum: Access::class)]
    public ?string $access;

    #[Optional]
    public ?bool $clearExpires;

    #[Optional]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Mark whether the file should be used in new content or not.
     */
    #[Optional]
    public ?bool $isUsableInContent;

    /**
     * New name for the file.
     */
    #[Optional]
    public ?string $name;

    /**
     * FolderId where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     */
    #[Optional('parentFolderId')]
    public ?string $parentFolderID;

    /**
     * Folder path where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     */
    #[Optional]
    public ?string $parentFolderPath;

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
        Access|string|null $access = null,
        ?bool $clearExpires = null,
        ?\DateTimeInterface $expiresAt = null,
        ?bool $isUsableInContent = null,
        ?string $name = null,
        ?string $parentFolderID = null,
        ?string $parentFolderPath = null,
    ): self {
        $self = new self;

        null !== $access && $self['access'] = $access;
        null !== $clearExpires && $self['clearExpires'] = $clearExpires;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $isUsableInContent && $self['isUsableInContent'] = $isUsableInContent;
        null !== $name && $self['name'] = $name;
        null !== $parentFolderID && $self['parentFolderID'] = $parentFolderID;
        null !== $parentFolderPath && $self['parentFolderPath'] = $parentFolderPath;

        return $self;
    }

    /**
     * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     *
     * @param Access|value-of<Access> $access
     */
    public function withAccess(Access|string $access): self
    {
        $self = clone $this;
        $self['access'] = $access;

        return $self;
    }

    public function withClearExpires(bool $clearExpires): self
    {
        $self = clone $this;
        $self['clearExpires'] = $clearExpires;

        return $self;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Mark whether the file should be used in new content or not.
     */
    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $self = clone $this;
        $self['isUsableInContent'] = $isUsableInContent;

        return $self;
    }

    /**
     * New name for the file.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * FolderId where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }

    /**
     * Folder path where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     */
    public function withParentFolderPath(string $parentFolderPath): self
    {
        $self = clone $this;
        $self['parentFolderPath'] = $parentFolderPath;

        return $self;
    }
}
