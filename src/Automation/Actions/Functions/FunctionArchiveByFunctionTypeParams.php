<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete a function within a given definition.
 *
 * @see HubspotSDK\Automation\Actions\Functions->archiveByFunctionType
 *
 * @phpstan-type FunctionArchiveByFunctionTypeParamsShape = array{
 *   appID: int, definitionID: string
 * }
 */
final class FunctionArchiveByFunctionTypeParams implements BaseModel
{
    /** @use SdkModel<FunctionArchiveByFunctionTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api]
    public string $definitionID;

    /**
     * `new FunctionArchiveByFunctionTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionArchiveByFunctionTypeParams::with(appID: ..., definitionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionArchiveByFunctionTypeParams)->withAppID(...)->withDefinitionID(...)
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
    public static function with(int $appID, string $definitionID): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->definitionID = $definitionID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withDefinitionID(string $definitionID): self
    {
        $obj = clone $this;
        $obj->definitionID = $definitionID;

        return $obj;
    }
}
