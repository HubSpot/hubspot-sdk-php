<?php

declare(strict_types=1);

namespace HubSpotSDK\Files\FileAssets;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Files\FileAssets\FileAssetUpdateParams\Access;

/**
 * Update properties of file by ID.
 *
 * @see HubSpotSDK\Services\Files\FileAssetsService::update()
 *
 * @phpstan-type FileAssetUpdateParamsShape = array{
 *   clearExpires: bool,
 *   access?: null|Access|value-of<Access>,
 *   expiresAt?: \DateTimeInterface|null,
 *   isUsableInContent?: bool|null,
 *   name?: string|null,
 *   parentFolderID?: string|null,
 *   parentFolderPath?: string|null,
 * }
 */
final class FileAssetUpdateParams implements BaseModel
{
    /** @use SdkModel<FileAssetUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public bool $clearExpires;

    /**
     * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     *
     * @var value-of<Access>|null $access
     */
    #[Optional(enum: Access::class)]
    public ?string $access;

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

    /**
     * `new FileAssetUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileAssetUpdateParams::with(clearExpires: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileAssetUpdateParams)->withClearExpires(...)
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
     * @param Access|value-of<Access>|null $access
     */
    public static function with(
        bool $clearExpires,
        Access|string|null $access = null,
        ?\DateTimeInterface $expiresAt = null,
        ?bool $isUsableInContent = null,
        ?string $name = null,
        ?string $parentFolderID = null,
        ?string $parentFolderPath = null,
    ): self {
        $self = new self;

        $self['clearExpires'] = $clearExpires;

        null !== $access && $self['access'] = $access;
        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $isUsableInContent && $self['isUsableInContent'] = $isUsableInContent;
        null !== $name && $self['name'] = $name;
        null !== $parentFolderID && $self['parentFolderID'] = $parentFolderID;
        null !== $parentFolderPath && $self['parentFolderPath'] = $parentFolderPath;

        return $self;
    }

    public function withClearExpires(bool $clearExpires): self
    {
        $self = clone $this;
        $self['clearExpires'] = $clearExpires;

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
