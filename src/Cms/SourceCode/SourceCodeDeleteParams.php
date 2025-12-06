<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Deletes the file at the specified path in the specified environment.
 *
 * @see HubspotSDK\Services\Cms\SourceCodeService::delete()
 *
 * @phpstan-type SourceCodeDeleteParamsShape = array{environment: string}
 */
final class SourceCodeDeleteParams implements BaseModel
{
    /** @use SdkModel<SourceCodeDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
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
        $obj = new self;

        $obj['environment'] = $environment;

        return $obj;
    }

    public function withEnvironment(string $environment): self
    {
        $obj = clone $this;
        $obj['environment'] = $environment;

        return $obj;
    }
}
