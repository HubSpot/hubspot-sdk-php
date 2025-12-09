<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Validates the file contents passed to the endpoint given a specified path and environment. Accepts multipart/form-data content type.
 *
 * @see HubspotSDK\Services\Cms\SourceCodeService::validate()
 *
 * @phpstan-type SourceCodeValidateParamsShape = array{
 *   environment: string, file?: string
 * }
 */
final class SourceCodeValidateParams implements BaseModel
{
    /** @use SdkModel<SourceCodeValidateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $environment;

    #[Optional]
    public ?string $file;

    /**
     * `new SourceCodeValidateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCodeValidateParams::with(environment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCodeValidateParams)->withEnvironment(...)
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

        $obj['environment'] = $environment;

        null !== $file && $obj['file'] = $file;

        return $obj;
    }

    public function withEnvironment(string $environment): self
    {
        $obj = clone $this;
        $obj['environment'] = $environment;

        return $obj;
    }

    public function withFile(string $file): self
    {
        $obj = clone $this;
        $obj['file'] = $file;

        return $obj;
    }
}
