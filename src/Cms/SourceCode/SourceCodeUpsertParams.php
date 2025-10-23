<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Upserts a file at the specified path in the specified environment. Accepts multipart/form-data content type.
 *
 * @see HubspotSDK\Cms\SourceCode->upsert
 *
 * @phpstan-type source_code_upsert_params = array{
 *   environment: string, file?: string
 * }
 */
final class SourceCodeUpsertParams implements BaseModel
{
    /** @use SdkModel<source_code_upsert_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $environment;

    #[Api(optional: true)]
    public ?string $file;

    /**
     * `new SourceCodeUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCodeUpsertParams::with(environment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCodeUpsertParams)->withEnvironment(...)
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
