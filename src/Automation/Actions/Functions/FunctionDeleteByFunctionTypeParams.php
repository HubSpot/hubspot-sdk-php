<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\Functions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete a function within a given definition.
 *
 * @see HubSpotSDK\Services\Automation\Actions\FunctionsService::deleteByFunctionType()
 *
 * @phpstan-type FunctionDeleteByFunctionTypeParamsShape = array{
 *   appID: int, definitionID: string
 * }
 */
final class FunctionDeleteByFunctionTypeParams implements BaseModel
{
    /** @use SdkModel<FunctionDeleteByFunctionTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $definitionID;

    /**
     * `new FunctionDeleteByFunctionTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionDeleteByFunctionTypeParams::with(appID: ..., definitionID: ...)
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
    public static function with(int $appID, string $definitionID): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['definitionID'] = $definitionID;

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
}
