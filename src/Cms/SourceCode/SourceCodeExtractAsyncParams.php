<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Extract a zip file in the developer file system. Extraction status can be checked with the `/extract/async/tasks/taskId/status` endpoint below.
 *
 * @see HubspotSDK\Cms\SourceCode->extractAsync
 *
 * @phpstan-type source_code_extract_async_params = array{path: string}
 */
final class SourceCodeExtractAsyncParams implements BaseModel
{
    /** @use SdkModel<source_code_extract_async_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
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
        $obj = new self;

        $obj->path = $path;

        return $obj;
    }

    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj->path = $path;

        return $obj;
    }
}
