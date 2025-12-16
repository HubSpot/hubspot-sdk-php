<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileOperations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Upload a single file with content specified in request body.
 *
 * @see HubspotSDK\Services\Files\FileOperationsService::upload()
 *
 * @phpstan-type FileOperationUploadParamsShape = array{
 *   charsetHunch?: string|null,
 *   file?: string|null,
 *   fileName?: string|null,
 *   folderID?: string|null,
 *   folderPath?: string|null,
 *   options?: string|null,
 * }
 */
final class FileOperationUploadParams implements BaseModel
{
    /** @use SdkModel<FileOperationUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Character set of the uploaded file.
     */
    #[Optional]
    public ?string $charsetHunch;

    /**
     * File to be uploaded.
     */
    #[Optional]
    public ?string $file;

    /**
     * Desired name for the uploaded file.
     */
    #[Optional]
    public ?string $fileName;

    /**
     * Either 'folderId' or 'folderPath' is required. folderId is the ID of the folder the file will be uploaded to.
     */
    #[Optional('folderId')]
    public ?string $folderID;

    /**
     * Either 'folderPath' or 'folderId' is required. This field represents the destination folder path for the uploaded file. If a path doesn't exist, the system will try to create one.
     */
    #[Optional]
    public ?string $folderPath;

    /**
     * JSON string representing FileUploadOptions.
     */
    #[Optional]
    public ?string $options;

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
        ?string $charsetHunch = null,
        ?string $file = null,
        ?string $fileName = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $options = null,
    ): self {
        $self = new self;

        null !== $charsetHunch && $self['charsetHunch'] = $charsetHunch;
        null !== $file && $self['file'] = $file;
        null !== $fileName && $self['fileName'] = $fileName;
        null !== $folderID && $self['folderID'] = $folderID;
        null !== $folderPath && $self['folderPath'] = $folderPath;
        null !== $options && $self['options'] = $options;

        return $self;
    }

    /**
     * Character set of the uploaded file.
     */
    public function withCharsetHunch(string $charsetHunch): self
    {
        $self = clone $this;
        $self['charsetHunch'] = $charsetHunch;

        return $self;
    }

    /**
     * File to be uploaded.
     */
    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * Desired name for the uploaded file.
     */
    public function withFileName(string $fileName): self
    {
        $self = clone $this;
        $self['fileName'] = $fileName;

        return $self;
    }

    /**
     * Either 'folderId' or 'folderPath' is required. folderId is the ID of the folder the file will be uploaded to.
     */
    public function withFolderID(string $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }

    /**
     * Either 'folderPath' or 'folderId' is required. This field represents the destination folder path for the uploaded file. If a path doesn't exist, the system will try to create one.
     */
    public function withFolderPath(string $folderPath): self
    {
        $self = clone $this;
        $self['folderPath'] = $folderPath;

        return $self;
    }

    /**
     * JSON string representing FileUploadOptions.
     */
    public function withOptions(string $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
