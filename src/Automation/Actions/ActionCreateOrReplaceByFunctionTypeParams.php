<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Add a function for a given definition.
 *
 * @see HubspotSDK\Services\Automation\ActionsService::createOrReplaceByFunctionType()
 *
 * @phpstan-type ActionCreateOrReplaceByFunctionTypeParamsShape = array{
 *   appID: int, definitionID: string, body: string
 * }
 */
final class ActionCreateOrReplaceByFunctionTypeParams implements BaseModel
{
    /** @use SdkModel<ActionCreateOrReplaceByFunctionTypeParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $definitionID;

    #[Required]
    public string $body;

    /**
     * `new ActionCreateOrReplaceByFunctionTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionCreateOrReplaceByFunctionTypeParams::with(
     *   appID: ..., definitionID: ..., body: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionCreateOrReplaceByFunctionTypeParams)
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
