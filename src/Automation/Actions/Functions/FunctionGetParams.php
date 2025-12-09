<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Automation\Actions\Functions\FunctionGetParams\FunctionType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific function from a given definition.
 *
 * @see HubspotSDK\Services\Automation\Actions\FunctionsService::get()
 *
 * @phpstan-type FunctionGetParamsShape = array{
 *   appId: int,
 *   definitionId: string,
 *   functionType: FunctionType|value-of<FunctionType>,
 * }
 */
final class FunctionGetParams implements BaseModel
{
    /** @use SdkModel<FunctionGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

    #[Required]
    public string $definitionId;

    /** @var value-of<FunctionType> $functionType */
    #[Required(enum: FunctionType::class)]
    public string $functionType;

    /**
     * `new FunctionGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionGetParams::with(appId: ..., definitionId: ..., functionType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionGetParams)
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
        int $appId,
        string $definitionId,
        FunctionType|string $functionType
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['definitionId'] = $definitionId;
        $obj['functionType'] = $functionType;

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
