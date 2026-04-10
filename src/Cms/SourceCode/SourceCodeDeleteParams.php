<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\SourceCode;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Deletes the file at the specified path in the specified environment.
 *
 * @see HubSpotSDK\Services\Cms\SourceCodeService::delete()
 *
 * @phpstan-type SourceCodeDeleteParamsShape = array{environment: string}
 */
final class SourceCodeDeleteParams implements BaseModel
{
    /** @use SdkModel<SourceCodeDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $environment;

    /**
     * `new SourceCodeDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SourceCodeDeleteParams::with(environment: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SourceCodeDeleteParams)->withEnvironment(...)
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
