<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all functions included in a definition.
 *
 * @see HubspotSDK\Services\Automation\Actions\FunctionsService::list()
 *
 * @phpstan-type FunctionListParamsShape = array{appId: int}
 */
final class FunctionListParams implements BaseModel
{
    /** @use SdkModel<FunctionListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    /**
     * `new FunctionListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionListParams::with(appId: ...)
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
    public static function with(int $appId): self
    {
        $obj = new self;

        $obj['appId'] = $appId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }
}
