<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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

    #[Required]
    public string $environment;

    #[Optional]
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
        $self = new self;

        $self['environment'] = $environment;

        null !== $file && $self['file'] = $file;

        return $self;
    }

    public function withEnvironment(string $environment): self
    {
        $self = clone $this;
        $self['environment'] = $environment;

        return $self;
    }

    public function withFile(string $file): self
    {
        $self = clone $this;
        $self['file'] = $file;

        return $self;
    }
}
