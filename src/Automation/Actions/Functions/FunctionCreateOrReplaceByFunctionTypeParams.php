<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\Functions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Add a function for a given definition.
 *
 * @see HubSpotSDK\Services\Automation\Actions\FunctionsService::createOrReplaceByFunctionType()
 *
 * @phpstan-type FunctionCreateOrReplaceByFunctionTypeParamsShape = array{
 *   appID: int, definitionID: string, body: string
 * }
 */
final class FunctionCreateOrReplaceByFunctionTypeParams implements BaseModel
{
    /** @use SdkModel<FunctionCreateOrReplaceByFunctionTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $definitionID;

    #[Required]
    public string $body;

    /**
     * `new FunctionCreateOrReplaceByFunctionTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionCreateOrReplaceByFunctionTypeParams::with(
     *   appID: ..., definitionID: ..., body: ...
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
        int $appID,
        string $definitionID,
        string $body
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['definitionID'] = $definitionID;
        $self['body'] = $body;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withDefinitionID(string $definitionID): self
    {
        $self = clone $this;
        $self['definitionID'] = $definitionID;

        return $self;
    }

    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
