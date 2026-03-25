<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\ActionDeleteParams\FunctionType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Automation\ActionsService::delete()
 *
 * @phpstan-type ActionDeleteParamsShape = array{
 *   appID: int,
 *   definitionID: string,
 *   functionType: FunctionType|value-of<FunctionType>,
 * }
 */
final class ActionDeleteParams implements BaseModel
{
    /** @use SdkModel<ActionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $definitionID;

    /** @var value-of<FunctionType> $functionType */
    #[Required(enum: FunctionType::class)]
    public string $functionType;

    /**
     * `new ActionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionDeleteParams::with(appID: ..., definitionID: ..., functionType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionDeleteParams)
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
        $self = new self;

        $self['appID'] = $appID;
        $self['definitionID'] = $definitionID;
        $self['functionType'] = $functionType;

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

    /**
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public function withFunctionType(FunctionType|string $functionType): self
    {
        $self = clone $this;
        $self['functionType'] = $functionType;

        return $self;
    }
}
