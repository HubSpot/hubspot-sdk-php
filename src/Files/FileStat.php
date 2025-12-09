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
     *   defaultHostingUrl?: string|null,
     *   encoding?: string|null,
     *   expiresAt?: int|null,
     *   extension?: string|null,
     *   fileMd5?: string|null,
     *   height?: int|null,
     *   isUsableInContent?: bool|null,
     *   name?: string|null,
     *   parentFolderId?: string|null,
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
     *   parentFolderId?: string|null,
     *   path?: string|null,
     * } $folder
     */
    public static function with(
        File|array|null $file = null,
        Folder|array|null $folder = null
    ): self {
        $obj = new self;

        null !== $file && $obj['file'] = $file;
        null !== $folder && $obj['folder'] = $folder;

        return $obj;
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
     *   defaultHostingUrl?: string|null,
     *   encoding?: string|null,
     *   expiresAt?: int|null,
     *   extension?: string|null,
     *   fileMd5?: string|null,
     *   height?: int|null,
     *   isUsableInContent?: bool|null,
     *   name?: string|null,
     *   parentFolderId?: string|null,
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
        $obj = clone $this;
        $obj['file'] = $file;

        return $obj;
    }

    /**
     * @param Folder|array{
     *   id: string,
     *   archived: bool,
     *   createdAt: \DateTimeInterface,
     *   updatedAt: \DateTimeInterface,
     *   archivedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   parentFolderId?: string|null,
     *   path?: string|null,
     * } $folder
     */
    public function withFolder(Folder|array $folder): self
    {
        $obj = clone $this;
        $obj['folder'] = $folder;

        return $obj;
    }
}
