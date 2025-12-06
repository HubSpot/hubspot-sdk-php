<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Gets the metadata object for the file at the specified path in the specified environment.
 *
 * @see HubspotSDK\Services\Cms\SourceCodeService::getMetadata()
 *
 * @phpstan-type SourceCodeGetMetadataParamsShape = array{
 *   environment: string, properties?: string
 * }
 */
final class SourceCodeGetMetadataParams implements BaseModel
{
    /** @use SdkModel<SourceCodeGetMetadataParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $environment;

    #[Api(optional: true)]
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
        $obj = new self;

        $obj['environment'] = $environment;

        null !== $properties && $obj['properties'] = $properties;

        return $obj;
    }

    public function withEnvironment(string $environment): self
    {
        $obj = clone $this;
        $obj['environment'] = $environment;

        return $obj;
    }

    public function withProperties(string $properties): self
    {
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }
}
