<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FileExtractRequestShape = array{path: string}
 */
final class FileExtractRequest implements BaseModel
{
    /** @use SdkModel<FileExtractRequestShape> */
    use SdkModel;

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
        $obj = new self;

        $obj['path'] = $path;

        return $obj;
    }

    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj['path'] = $path;

        return $obj;
    }
}
