<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\SourceCode;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FileExtractRequestShape = array{path: string}
 */
final class FileExtractRequest implements BaseModel
{
    /** @use SdkModel<FileExtractRequestShape> */
    use SdkModel;

    /**
     * The file system location where the zip file is to be extracted.
     */
    #[Required]
    public string $path;

    /**
     * `new FileExtractRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileExtractRequest::with(path: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileExtractRequest)->withPath(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $path): self
    {
        $self = new self;

        $self['path'] = $path;

        return $self;
    }

    /**
     * The file system location where the zip file is to be extracted.
     */
    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }
}
