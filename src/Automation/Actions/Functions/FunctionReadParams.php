<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Automation\Actions\Functions\FunctionReadParams\FunctionType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific function from a given definition.
 *
 * @see HubspotSDK\Automation\Actions\Functions->read
 *
 * @phpstan-type FunctionReadParamsShape = array{
 *   appID: int,
 *   definitionID: string,
 *   functionType: FunctionType|value-of<FunctionType>,
 * }
 */
final class FunctionReadParams implements BaseModel
{
    /** @use SdkModel<FunctionReadParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api]
    public string $definitionID;

    /** @var value-of<FunctionType> $functionType */
    #[Api(enum: FunctionType::class)]
    public string $functionType;

    /**
     * `new FunctionReadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionReadParams::with(appID: ..., definitionID: ..., functionType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionReadParams)
     *   ->withAppID(...)
     *   ->withDefinitionID(...)
     *   ->withFunctionType(...)
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
     *
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public static function with(
        int $appID,
        string $definitionID,
        FunctionType|string $functionType
    ): self {
        $obj = new self;

        $obj->appID = $appID;
        $obj->definitionID = $definitionID;
        $obj['functionType'] = $functionType;

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

    /**
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public function withFunctionType(FunctionType|string $functionType): self
    {
        $obj = clone $this;
        $obj['functionType'] = $functionType;

        return $obj;
    }
}
