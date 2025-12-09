<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a function within a given definition.
 *
 * @see HubspotSDK\Services\Automation\Actions\FunctionsService::deleteByFunctionType()
 *
 * @phpstan-type FunctionDeleteByFunctionTypeParamsShape = array{
 *   appId: int, definitionId: string
 * }
 */
final class FunctionDeleteByFunctionTypeParams implements BaseModel
{
    /** @use SdkModel<FunctionDeleteByFunctionTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    #[Required]
    public string $definitionId;

    /**
     * `new FunctionDeleteByFunctionTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionDeleteByFunctionTypeParams::with(appId: ..., definitionId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionDeleteByFunctionTypeParams)->withAppID(...)->withDefinitionID(...)
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
    public static function with(int $appId, string $definitionId): self
    {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['definitionId'] = $definitionId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withDefinitionID(string $definitionID): self
    {
        $obj = clone $this;
        $obj['definitionId'] = $definitionID;

        return $obj;
    }
}
