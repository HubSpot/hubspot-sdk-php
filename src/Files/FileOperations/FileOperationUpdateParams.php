<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileOperations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\FileOperations\FileOperationUpdateParams\Access;

/**
 * Update properties of file by ID.
 *
 * @see HubspotSDK\Services\Files\FileOperationsService::update()
 *
 * @phpstan-type FileOperationUpdateParamsShape = array{
 *   access?: Access|value-of<Access>,
 *   clearExpires?: bool,
 *   expiresAt?: \DateTimeInterface,
 *   isUsableInContent?: bool,
 *   name?: string,
 *   parentFolderId?: string,
 *   parentFolderPath?: string,
 * }
 */
final class FileOperationUpdateParams implements BaseModel
{
    /** @use SdkModel<FileOperationUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     *
     * @var value-of<Access>|null $access
     */
    #[Api(enum: Access::class, optional: true)]
    public ?string $access;

    #[Api(optional: true)]
    public ?bool $clearExpires;

    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Mark whether the file should be used in new content or not.
     */
    #[Api(optional: true)]
    public ?bool $isUsableInContent;

    /**
     * New name for the file.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * FolderId where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     */
    #[Api(optional: true)]
    public ?string $parentFolderId;

    /**
     * Folder path where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     */
    #[Api(optional: true)]
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
        ?string $parentFolderId = null,
        ?string $parentFolderPath = null,
    ): self {
        $obj = new self;

        null !== $access && $obj['access'] = $access;
        null !== $clearExpires && $obj['clearExpires'] = $clearExpires;
        null !== $expiresAt && $obj['expiresAt'] = $expiresAt;
        null !== $isUsableInContent && $obj['isUsableInContent'] = $isUsableInContent;
        null !== $name && $obj['name'] = $name;
        null !== $parentFolderId && $obj['parentFolderId'] = $parentFolderId;
        null !== $parentFolderPath && $obj['parentFolderPath'] = $parentFolderPath;

        return $obj;
    }

    /**
     * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     *
     * @param Access|value-of<Access> $access
     */
    public function withAccess(Access|string $access): self
    {
        $obj = clone $this;
        $obj['access'] = $access;

        return $obj;
    }

    public function withClearExpires(bool $clearExpires): self
    {
        $obj = clone $this;
        $obj['clearExpires'] = $clearExpires;

        return $obj;
    }

    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj['expiresAt'] = $expiresAt;

        return $obj;
    }

    /**
     * Mark whether the file should be used in new content or not.
     */
    public function withIsUsableInContent(bool $isUsableInContent): self
    {
        $obj = clone $this;
        $obj['isUsableInContent'] = $isUsableInContent;

        return $obj;
    }

    /**
     * New name for the file.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * FolderId where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj['parentFolderId'] = $parentFolderID;

        return $obj;
    }

    /**
     * Folder path where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     */
    public function withParentFolderPath(string $parentFolderPath): self
    {
        $obj = clone $this;
        $obj['parentFolderPath'] = $parentFolderPath;

        return $obj;
    }
}
