<?php

declare(strict_types=1);

namespace HubspotSDK\Files\FileOperations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replace existing file data with new file data. Can be used to change image content without having to upload a new file and update all references.
 *
 * @see HubspotSDK\Services\Files\FileOperationsService::replace()
 *
 * @phpstan-type FileOperationReplaceParamsShape = array{
 *   charsetHunch?: string|null, file?: string|null, options?: string|null
 * }
 */
final class FileOperationReplaceParams implements BaseModel
{
    /** @use SdkModel<FileOperationReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Character set of given file data.
     */
    #[Optional]
    public ?string $charsetHunch;

    /**
     * File data that will replace existing file in the file manager.
     */
    #[Optional]
    public ?string $file;

    /**
     * JSON string representing FileReplaceOptions. Includes options to set the access and expiresAt properties, which will automatically update when the file is replaced.
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
        ?string $options = null
    ): self {
        $self = new self;

        null !== $charsetHunch && $self['charsetHunch'] = $charsetHunch;
        null !== $file && $self['file'] = $file;
        null !== $options && $self['options'] = $options;

        return $self;
    }

    /**
     * Character set of given file data.
     */
    public function withCharsetHunch(string $charsetHunch): self
    {
        $self = clone $this;
        $self['charsetHunch'] = $charsetHunch;

        return $self;
    }

    /**
     * File data that will replace existing file in the file manager.
     */
    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }

    /**
     * JSON string representing FileReplaceOptions. Includes options to set the access and expiresAt properties, which will automatically update when the file is replaced.
     */
    public function withOptions(string $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
