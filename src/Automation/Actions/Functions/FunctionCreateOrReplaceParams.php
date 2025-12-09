<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions\Functions;

use HubspotSDK\Automation\Actions\Functions\FunctionCreateOrReplaceParams\FunctionType;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a function for a given definition by ID.
 *
 * @see HubspotSDK\Services\Automation\Actions\FunctionsService::createOrReplace()
 *
 * @phpstan-type FunctionCreateOrReplaceParamsShape = array{
 *   appID: int,
 *   definitionID: string,
 *   functionType: FunctionType|value-of<FunctionType>,
 *   body: string,
 * }
 */
final class FunctionCreateOrReplaceParams implements BaseModel
{
    /** @use SdkModel<FunctionCreateOrReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $definitionID;

    /** @var value-of<FunctionType> $functionType */
    #[Required(enum: FunctionType::class)]
    public string $functionType;

    #[Required]
    public string $body;

    /**
     * `new FunctionCreateOrReplaceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionCreateOrReplaceParams::with(
     *   appID: ..., definitionID: ..., functionType: ..., body: ...
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
        int $appID,
        string $definitionID,
        FunctionType|string $functionType,
        string $body,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['definitionID'] = $definitionID;
        $self['functionType'] = $functionType;
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

    /**
     * @param FunctionType|value-of<FunctionType> $functionType
     */
    public function withFunctionType(FunctionType|string $functionType): self
    {
        $self = clone $this;
        $self['functionType'] = $functionType;

        return $self;
    }

    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }
}
