<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Add a function for a given definition.
 *
 * @see HubspotSDK\Services\Automation\Actions\FunctionsService::createOrReplaceByFunctionType()
 *
 * @phpstan-type FunctionCreateOrReplaceByFunctionTypeParamsShape = array{
 *   appId: int, definitionId: string, body: string
 * }
 */
final class FunctionCreateOrReplaceByFunctionTypeParams implements BaseModel
{
    /** @use SdkModel<FunctionCreateOrReplaceByFunctionTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    #[Api]
    public string $definitionId;

    #[Api]
    public string $body;

    /**
     * `new FunctionCreateOrReplaceByFunctionTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionCreateOrReplaceByFunctionTypeParams::with(
     *   appId: ..., definitionId: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionCreateOrReplaceByFunctionTypeParams)
     *   ->withAppID(...)
     *   ->withDefinitionID(...)
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
     */
    public static function with(
        int $appId,
        string $definitionId,
        string $body
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['definitionId'] = $definitionId;
        $obj['body'] = $body;

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

    public function withBody(string $body): self
    {
        $obj = clone $this;
        $obj['body'] = $body;

        return $obj;
    }
}
