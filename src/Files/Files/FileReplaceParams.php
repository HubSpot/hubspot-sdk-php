<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replace existing file data with new file data. Can be used to change image content without having to upload a new file and update all references.
 *
 * @see HubspotSDK\Services\Files\FilesService::replace()
 *
 * @phpstan-type FileReplaceParamsShape = array{
 *   charsetHunch?: string, file?: string, options?: string
 * }
 */
final class FileReplaceParams implements BaseModel
{
    /** @use SdkModel<FileReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Character set of given file data.
     */
    #[Api(optional: true)]
    public ?string $charsetHunch;

    /**
     * File data that will replace existing file in the file manager.
     */
    #[Api(optional: true)]
    public ?string $file;

    /**
     * JSON string representing FileReplaceOptions. Includes options to set the access and expiresAt properties, which will automatically update when the file is replaced.
     */
    #[Api(optional: true)]
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
        ?string $options = null
    ): self {
        $obj = new self;

        null !== $charsetHunch && $obj->charsetHunch = $charsetHunch;
        null !== $file && $obj->file = $file;
        null !== $options && $obj->options = $options;

        return $obj;
    }

    /**
     * Character set of given file data.
     */
    public function withCharsetHunch(string $charsetHunch): self
    {
        $obj = clone $this;
        $obj->charsetHunch = $charsetHunch;

        return $obj;
    }

    /**
     * File data that will replace existing file in the file manager.
     */
    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }

    /**
     * JSON string representing FileReplaceOptions. Includes options to set the access and expiresAt properties, which will automatically update when the file is replaced.
     */
    public function withOptions(string $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }
}
