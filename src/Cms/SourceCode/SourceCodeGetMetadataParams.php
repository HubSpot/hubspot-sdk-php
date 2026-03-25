<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve metadata for a specific file or folder within a specified environment in the HubSpot CMS. This endpoint is useful for obtaining detailed information about content files, such as their creation and update timestamps, and other metadata attributes.
 *
 * @see HubspotSDK\Services\Cms\SourceCodeService::getMetadata()
 *
 * @phpstan-type SourceCodeGetMetadataParamsShape = array{
 *   environment: string, properties?: string|null
 * }
 */
final class SourceCodeGetMetadataParams implements BaseModel
{
    /** @use SdkModel<SourceCodeGetMetadataParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $environment;

    /**
     * A comma-separated list of specific metadata properties to include in the response.
     */
    #[Optional]
    public ?string $properties;

    /**
     * `new SourceCodeGetMetadataParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCodeGetMetadataParams::with(environment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCodeGetMetadataParams)->withEnvironment(...)
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
    public static function with(
        string $environment,
        ?string $properties = null
    ): self {
        $self = new self;

        $self['environment'] = $environment;

        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    public function withEnvironment(string $environment): self
    {
        $self = clone $this;
        $self['environment'] = $environment;

        return $self;
    }

    /**
     * A comma-separated list of specific metadata properties to include in the response.
     */
    public function withProperties(string $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
