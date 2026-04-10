<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Set whether a custom action definition requires an object.
 *
 * @see HubSpotSDK\Services\Automation\Actions\DefinitionsService::createRequiresObject()
 *
 * @phpstan-type DefinitionCreateRequiresObjectParamsShape = array{
 *   appID: int, requiresObject: bool
 * }
 */
final class DefinitionCreateRequiresObjectParams implements BaseModel
{
    /** @use SdkModel<DefinitionCreateRequiresObjectParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * Indicates whether a custom action definition requires an associated object.
     */
    #[Required]
    public bool $requiresObject;

    /**
     * `new DefinitionCreateRequiresObjectParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionCreateRequiresObjectParams::with(appID: ..., requiresObject: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionCreateRequiresObjectParams)
     *   ->withAppID(...)
     *   ->withRequiresObject(...)
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

    /**
     * Indicates whether a custom action definition requires an associated object.
     */
    public function withRequiresObject(bool $requiresObject): self
    {
        $self = clone $this;
        $self['requiresObject'] = $requiresObject;

        return $self;
    }
}
