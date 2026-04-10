<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing property from a custom event definition.
 *
 * @see HubSpotSDK\Services\Events\DefinitionsService::deleteProperty()
 *
 * @phpstan-type DefinitionDeletePropertyParamsShape = array{eventName: string}
 */
final class DefinitionDeletePropertyParams implements BaseModel
{
    /** @use SdkModel<DefinitionDeletePropertyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $eventName;

    /**
     * `new DefinitionDeletePropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionDeletePropertyParams::with(eventName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionDeletePropertyParams)->withEventName(...)
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
    public static function with(string $eventName): self
    {
        $self = new self;

        $self['eventName'] = $eventName;

        return $self;
    }

    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }
}
