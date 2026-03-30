<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a specific revision of a definition by revision ID.
 *
 * @see HubspotSDK\Services\Automation\ActionsService::get()
 *
 * @phpstan-type ActionGetParamsShape = array{appID: int, definitionID: string}
 */
final class ActionGetParams implements BaseModel
{
    /** @use SdkModel<ActionGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $definitionID;

    /**
     * `new ActionGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionGetParams::with(appID: ..., definitionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionGetParams)->withAppID(...)->withDefinitionID(...)
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
