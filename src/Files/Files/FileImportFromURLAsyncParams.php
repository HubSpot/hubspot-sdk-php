<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationStrategy;

/**
 * Asynchronously imports the file at the given URL into the file manager.
 *
 * @see HubspotSDK\Files\Files->importFromURLAsync
 *
 * @phpstan-type FileImportFromURLAsyncParamsShape = array{
 *   access: Access|value-of<Access>,
 *   url: string,
 *   duplicateValidationScope?: DuplicateValidationScope|value-of<DuplicateValidationScope>,
 *   duplicateValidationStrategy?: DuplicateValidationStrategy|value-of<DuplicateValidationStrategy>,
 *   expiresAt?: \DateTimeInterface,
 *   folderID?: string,
 *   folderPath?: string,
 *   name?: string,
 *   overwrite?: bool,
 *   ttl?: string,
 * }
 */
final class FileImportFromURLAsyncParams implements BaseModel
{
    /** @use SdkModel<FileImportFromURLAsyncParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * PUBLIC_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines can index the file. PUBLIC_NOT_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines *can't* index the file. PRIVATE: File is NOT publicly accessible. Requires a signed URL to see content. Search engines *can't* index the file.
     *
     * @var value-of<Access> $access
     */
    #[Api(enum: Access::class)]
    public string $access;

    /**
     * URL to download the new file from.
     */
    #[Api]
    public string $url;

    /**
     * ENTIRE_PORTAL: Look for a duplicate file in the entire account. EXACT_FOLDER: Look for a duplicate file in the provided folder.
     *
     * @var value-of<DuplicateValidationScope>|null $duplicateValidationScope
     */
    #[Api(enum: DuplicateValidationScope::class, optional: true)]
    public ?string $duplicateValidationScope;

    /**
     * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     *
     * @var value-of<DuplicateValidationStrategy>|null $duplicateValidationStrategy
     */
    #[Api(enum: DuplicateValidationStrategy::class, optional: true)]
    public ?string $duplicateValidationStrategy;

    /**
     * Specifies the date and time when the file will expire.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * One of folderId or folderPath is required. Destination folderId for the uploaded file.
     */
    #[Api('folderId', optional: true)]
    public ?string $folderID;

    /**
     * One of folderPath or folderId is required. Destination folder path for the uploaded file. If the folder path does not exist, there will be an attempt to create the folder path.
     */
    #[Api(optional: true)]
    public ?string $folderPath;

    /**
     * Name to give the resulting file in the file manager.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * If true, will overwrite existing file if one with the same name and extension exists in the given folder. The overwritten file will be deleted and the uploaded file will take its place with a new ID. If unset or set as false, the new file's name will be updated to prevent colliding with existing file if one exists with the same path, name, and extension.
     */
    #[Api(optional: true)]
    public ?bool $overwrite;

    /**
     * Time to live. If specified the file will be deleted after the given time frame. If left unset, the file will exist indefinitely.
     */
    #[Api(optional: true)]
    public ?string $ttl;

    /**
     * `new FileImportFromURLAsyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileImportFromURLAsyncParams::with(access: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileImportFromURLAsyncParams)->withAccess(...)->withURL(...)
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
     * @param DuplicateValidationScope|value-of<DuplicateValidationScope> $duplicateValidationScope
     * @param DuplicateValidationStrategy|value-of<DuplicateValidationStrategy> $duplicateValidationStrategy
     */
    public static function with(
        Access|string $access,
        string $url,
        DuplicateValidationScope|string|null $duplicateValidationScope = null,
        DuplicateValidationStrategy|string|null $duplicateValidationStrategy = null,
        ?\DateTimeInterface $expiresAt = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $name = null,
        ?bool $overwrite = null,
        ?string $ttl = null,
    ): self {
        $obj = new self;

        $obj['access'] = $access;
        $obj->url = $url;

        null !== $duplicateValidationScope && $obj['duplicateValidationScope'] = $duplicateValidationScope;
        null !== $duplicateValidationStrategy && $obj['duplicateValidationStrategy'] = $duplicateValidationStrategy;
        null !== $expiresAt && $obj->expiresAt = $expiresAt;
        null !== $folderID && $obj->folderID = $folderID;
        null !== $folderPath && $obj->folderPath = $folderPath;
        null !== $name && $obj->name = $name;
        null !== $overwrite && $obj->overwrite = $overwrite;
        null !== $ttl && $obj->ttl = $ttl;

        return $obj;
    }

    /**
     * PUBLIC_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines can index the file. PUBLIC_NOT_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines *can't* index the file. PRIVATE: File is NOT publicly accessible. Requires a signed URL to see content. Search engines *can't* index the file.
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
     * URL to download the new file from.
     */
    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj->url = $url;

        return $obj;
    }

    /**
     * ENTIRE_PORTAL: Look for a duplicate file in the entire account. EXACT_FOLDER: Look for a duplicate file in the provided folder.
     *
     * @param DuplicateValidationScope|value-of<DuplicateValidationScope> $duplicateValidationScope
     */
    public function withDuplicateValidationScope(
        DuplicateValidationScope|string $duplicateValidationScope
    ): self {
        $obj = clone $this;
        $obj['duplicateValidationScope'] = $duplicateValidationScope;

        return $obj;
    }

    /**
     * NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     *
     * @param DuplicateValidationStrategy|value-of<DuplicateValidationStrategy> $duplicateValidationStrategy
     */
    public function withDuplicateValidationStrategy(
        DuplicateValidationStrategy|string $duplicateValidationStrategy
    ): self {
        $obj = clone $this;
        $obj['duplicateValidationStrategy'] = $duplicateValidationStrategy;

        return $obj;
    }

    /**
     * Specifies the date and time when the file will expire.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $obj = clone $this;
        $obj->expiresAt = $expiresAt;

        return $obj;
    }

    /**
     * One of folderId or folderPath is required. Destination folderId for the uploaded file.
     */
    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj->folderID = $folderID;

        return $obj;
    }

    /**
     * One of folderPath or folderId is required. Destination folder path for the uploaded file. If the folder path does not exist, there will be an attempt to create the folder path.
     */
    public function withFolderPath(string $folderPath): self
    {
        $obj = clone $this;
        $obj->folderPath = $folderPath;

        return $obj;
    }

    /**
     * Name to give the resulting file in the file manager.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * If true, will overwrite existing file if one with the same name and extension exists in the given folder. The overwritten file will be deleted and the uploaded file will take its place with a new ID. If unset or set as false, the new file's name will be updated to prevent colliding with existing file if one exists with the same path, name, and extension.
     */
    public function withOverwrite(bool $overwrite): self
    {
        $obj = clone $this;
        $obj->overwrite = $overwrite;

        return $obj;
    }

    /**
     * Time to live. If specified the file will be deleted after the given time frame. If left unset, the file will exist indefinitely.
     */
    public function withTtl(string $ttl): self
    {
        $obj = clone $this;
        $obj->ttl = $ttl;

        return $obj;
    }
}
