<?php

declare(strict_types=1);

namespace HubSpotSDK\Files;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FileShape from \HubSpotSDK\Files\File
 * @phpstan-import-type FolderShape from \HubSpotSDK\Files\Folder
 *
 * @phpstan-type FileStatShape = array{
 *   file?: null|File|FileShape, folder?: null|Folder|FolderShape
 * }
 */
final class FileStat implements BaseModel
{
    /** @use SdkModel<FileStatShape> */
    use SdkModel;

    #[Optional]
    public ?File $file;

    #[Optional]
    public ?Folder $folder;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param File|FileShape|null $file
     * @param Folder|FolderShape|null $folder
     */
    public static function with(
        File|array|null $file = null,
        Folder|array|null $folder = null
    ): self {
        $self = new self;

        null !== $file && $self['file'] = $file;
        null !== $folder && $self['folder'] = $folder;

        return $self;
    }

    /**
     * @param File|FileShape $file
     */
    public function withFile(File|array $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * @param Folder|FolderShape $folder
     */
    public function withFolder(Folder|array $folder): self
    {
        $self = clone $this;
        $self['folder'] = $folder;

        return $self;
    }
}
