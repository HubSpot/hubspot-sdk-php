<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Creates a file at the specified path in the specified environment. Accepts multipart/form-data content type. Throws an error if a file already exists at the specified path.
 *
 * @deprecated
 * @see HubspotSDK\Services\Cms\SourceCodeService::create()
 *
 * @phpstan-type SourceCodeCreateParamsShape = array{
 *   environment: string, file?: string
 * }
 */
final class SourceCodeCreateParams implements BaseModel
{
    /** @use SdkModel<SourceCodeCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $environment;

    #[Api(optional: true)]
    public ?string $file;

    /**
     * `new SourceCodeCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCodeCreateParams::with(environment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCodeCreateParams)->withEnvironment(...)
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
    public static function with(string $environment, ?string $file = null): self
    {
        $obj = new self;

        $obj->environment = $environment;

        null !== $file && $obj->file = $file;

        return $obj;
    }

    public function withEnvironment(string $environment): self
    {
        $obj = clone $this;
        $obj->environment = $environment;

        return $obj;
    }

    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj->file = $file;

        return $obj;
    }
}
