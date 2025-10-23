<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all functions included in a definition.
 *
 * @see HubspotSDK\Automation\Actions\Functions->list
 *
 * @phpstan-type function_list_params = array{appID: int}
 */
final class FunctionListParams implements BaseModel
{
    /** @use SdkModel<function_list_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
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
        $obj = new self;

        $obj->appID = $appID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }
}
