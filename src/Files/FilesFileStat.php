<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type files_file_stat = array{file?: FilesFile, folder?: FilesFolder}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class FilesFileStat implements BaseModel
{
    /** @use SdkModel<files_file_stat> */
    use SdkModel;

    #[Api(optional: true)]
    public ?FilesFile $file;

    #[Api(optional: true)]
    public ?FilesFolder $folder;

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
        ?FilesFile $file = null,
        ?FilesFolder $folder = null
    ): self {
        $obj = new self;

        null !== $file && $obj->file = $file;
        null !== $folder && $obj->folder = $folder;

        return $obj;
    }

    public function withFile(FilesFile $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    public function withFolder(FilesFolder $folder): self
    {
        $obj = clone $this;
        $obj->folder = $folder;

        return $obj;
    }
}
