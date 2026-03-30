<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Upload a single file with content specified in request body.
 *
 * @see HubspotSDK\Services\Files\FilesService::upload()
 *
 * @phpstan-type FileUploadParamsShape = array{
 *   charsetHunch?: string|null,
 *   file?: string|null,
 *   fileName?: string|null,
 *   folderID?: string|null,
 *   folderPath?: string|null,
 *   options?: string|null,
 * }
 */
final class FileUploadParams implements BaseModel
{
    /** @use SdkModel<FileUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $charsetHunch;

    #[Optional]
    public ?string $file;

    #[Optional]
    public ?string $fileName;

    #[Optional('folderId')]
    public ?string $folderID;

    #[Optional]
    public ?string $folderPath;

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

    public function withCharsetHunch(string $charsetHunch): self
    {
        $self = clone $this;
        $self['charsetHunch'] = $charsetHunch;

        return $self;
    }

    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    public function withFileName(string $fileName): self
    {
        $self = clone $this;
        $self['fileName'] = $fileName;

        return $self;
    }

    public function withFolderID(string $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }

    public function withFolderPath(string $folderPath): self
    {
        $self = clone $this;
        $self['folderPath'] = $folderPath;

        return $self;
    }

    public function withOptions(string $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
