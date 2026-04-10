<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\Functions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all functions included in a definition.
 *
 * @see HubSpotSDK\Services\Automation\Actions\FunctionsService::list()
 *
 * @phpstan-type FunctionListParamsShape = array{appID: int}
 */
final class FunctionListParams implements BaseModel
{
    /** @use SdkModel<FunctionListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new FunctionListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionListParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionListParams)->withAppID(...)
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
    public static function with(int $appID): self
    {
        $self = new self;

        $self['appID'] = $appID;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }
}
