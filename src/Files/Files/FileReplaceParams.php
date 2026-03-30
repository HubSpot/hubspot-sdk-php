<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Replace existing file data with new file data. Can be used to change image content without having to upload a new file and update all references.
 *
 * @see HubspotSDK\Services\Files\FilesService::replace()
 *
 * @phpstan-type FileReplaceParamsShape = array{
 *   charsetHunch?: string|null, file?: string|null, options?: string|null
 * }
 */
final class FileReplaceParams implements BaseModel
{
    /** @use SdkModel<FileReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $charsetHunch;

    #[Optional]
    public ?string $file;

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

    public function withOptions(string $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
