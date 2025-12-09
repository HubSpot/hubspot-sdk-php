<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Files\File\Access;

/**
 * @phpstan-type FileStatShape = array{file?: File|null, folder?: Folder|null}
 */
final class FileStat implements BaseModel
{
    /** @use SdkModel<FileStatShape> */
    use SdkModel;

    /**
     * File.
     */
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
     * @param File|array{
     *   id: string,
     *   access: value-of<Access>,
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
     * } $file
     * @param Folder|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   parentFolderID?: string|null,
     *   path?: string|null,
     * } $folder
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
     * File.
     *
     * @param File|array{
     *   id: string,
     *   access: value-of<Access>,
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
     * } $file
     */
    public function withFile(File|array $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * @param Folder|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   parentFolderID?: string|null,
     *   path?: string|null,
     * } $folder
     */
    public function withFolder(Folder|array $folder): self
    {
        $self = clone $this;
        $self['folder'] = $folder;

        return $self;
    }
}
