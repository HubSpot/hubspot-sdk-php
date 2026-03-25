<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Automation\ActionsService::createRequiresObject()
 *
 * @phpstan-type ActionCreateRequiresObjectParamsShape = array{
 *   appID: int, requiresObject: bool
 * }
 */
final class ActionCreateRequiresObjectParams implements BaseModel
{
    /** @use SdkModel<ActionCreateRequiresObjectParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public bool $requiresObject;

    /**
     * `new ActionCreateRequiresObjectParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionCreateRequiresObjectParams::with(appID: ..., requiresObject: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionCreateRequiresObjectParams)->withAppID(...)->withRequiresObject(...)
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
    public static function with(int $appID, bool $requiresObject): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['requiresObject'] = $requiresObject;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withRequiresObject(bool $requiresObject): self
    {
        $self = clone $this;
        $self['requiresObject'] = $requiresObject;

        return $self;
    }
}
