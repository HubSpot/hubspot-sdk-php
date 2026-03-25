<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve content from the specified environment and path in your HubSpot CMS. This endpoint allows you to access specific content files based on the environment and path parameters, which can be useful for managing and displaying content in different environments.
 *
 * @see HubspotSDK\Services\Cms\SourceCodeService::get()
 *
 * @phpstan-type SourceCodeGetParamsShape = array{environment: string}
 */
final class SourceCodeGetParams implements BaseModel
{
    /** @use SdkModel<SourceCodeGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $environment;

    /**
     * `new SourceCodeGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCodeGetParams::with(environment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCodeGetParams)->withEnvironment(...)
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
    public static function with(string $environment): self
    {
        $self = new self;

        $self['environment'] = $environment;

        return $self;
    }

    public function withEnvironment(string $environment): self
    {
        $self = clone $this;
        $self['environment'] = $environment;

        return $self;
    }
}
