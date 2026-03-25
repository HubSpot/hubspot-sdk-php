<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Upload a content file to a specified environment and path in the HubSpot CMS. This endpoint allows you to add new content files to your HubSpot account by specifying the environment and path where the file should be stored. The request must include a file in binary format.
 *
 * @deprecated
 * @see HubspotSDK\Services\Cms\SourceCodeService::create()
 *
 * @phpstan-type SourceCodeCreateParamsShape = array{
 *   environment: string, file?: string|null
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
