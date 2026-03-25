<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Initiate an asynchronous extraction of source code files in the HubSpot CMS. This endpoint is useful for handling large file extractions without blocking the client application. Upon acceptance, it returns a task locator that can be used to check the status of the extraction process.
 *
 * @see HubspotSDK\Services\Cms\SourceCodeService::extractAsync()
 *
 * @phpstan-type SourceCodeExtractAsyncParamsShape = array{path: string}
 */
final class SourceCodeExtractAsyncParams implements BaseModel
{
    /** @use SdkModel<SourceCodeExtractAsyncParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The file system location where the zip file is to be extracted.
     */
    #[Required]
    public string $path;

    /**
     * `new SourceCodeExtractAsyncParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCodeExtractAsyncParams::with(path: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCodeExtractAsyncParams)->withPath(...)
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
