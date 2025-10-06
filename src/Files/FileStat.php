<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type file_stat = array{file?: File, folder?: Folder}
 */
final class FileStat implements BaseModel
{
    /** @use SdkModel<file_stat> */
    use SdkModel;

    #[Api(optional: true)]
    public ?File $file;

    #[Api(optional: true)]
    public ?Folder $folder;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?File $file = null, ?Folder $folder = null): self
    {
        $obj = new self;

        null !== $file && $obj->file = $file;
        null !== $folder && $obj->folder = $folder;

        return $obj;
    }

    public function withFile(File $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    public function withFolder(Folder $folder): self
    {
        $obj = clone $this;
        $obj->folder = $folder;

        return $obj;
    }
}
