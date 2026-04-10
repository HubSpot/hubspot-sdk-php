<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Actions\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve whether a custom action definition requires an object.
 *
 * @see HubSpotSDK\Services\Automation\Actions\DefinitionsService::getRequiresObject()
 *
 * @phpstan-type DefinitionGetRequiresObjectParamsShape = array{appID: int}
 */
final class DefinitionGetRequiresObjectParams implements BaseModel
{
    /** @use SdkModel<DefinitionGetRequiresObjectParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new DefinitionGetRequiresObjectParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionGetRequiresObjectParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionGetRequiresObjectParams)->withAppID(...)
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
    public static function with(int $appID): self
    {
        $self = new self;

        $self['appID'] = $appID;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }
}
