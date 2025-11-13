<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a function for a given definition by ID.
 *
 * @see HubspotSDK\Services\Automation\Actions\FunctionsService::createOrReplace()
 *
 * @phpstan-type FunctionCreateOrReplaceParamsShape = array{
 *   appId: int,
 *   definitionId: string,
 *   functionType: FunctionType|value-of<FunctionType>,
 *   body: string,
 * }
 */
final class FunctionCreateOrReplaceParams implements BaseModel
{
    /** @use SdkModel<FunctionCreateOrReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    #[Api]
    public string $definitionId;

    /** @var value-of<FunctionType> $functionType */
    #[Api(enum: FunctionType::class)]
    public string $functionType;

    #[Api]
    public string $body;

    /**
     * `new FunctionCreateOrReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionCreateOrReplaceParams::with(
     *   appId: ..., definitionId: ..., functionType: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionCreateOrReplaceParams)
     *   ->withAppID(...)
     *   ->withDefinitionID(...)
     *   ->withFunctionType(...)
     *   ->withBody(...)
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
        FunctionType|string $functionType,
        string $body,
    ): self {
        $obj = new self;

        $obj->appId = $appId;
        $obj->definitionId = $definitionId;
        $obj['functionType'] = $functionType;
        $obj->body = $body;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

        return $obj;
    }

    public function withDefinitionID(string $definitionID): self
    {
        $obj = clone $this;
        $obj->definitionId = $definitionID;

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

    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
