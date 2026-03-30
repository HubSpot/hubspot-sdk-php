<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Extract a zip file in the developer file system. Extraction status can be checked with the `/extract/async/tasks/taskId/status` endpoint below.
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
