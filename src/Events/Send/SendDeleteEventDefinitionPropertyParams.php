<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Send;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Events\SendService::deleteEventDefinitionProperty()
 *
 * @phpstan-type SendDeleteEventDefinitionPropertyParamsShape = array{
 *   eventName: string
 * }
 */
final class SendDeleteEventDefinitionPropertyParams implements BaseModel
{
    /** @use SdkModel<SendDeleteEventDefinitionPropertyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $eventName;

    /**
     * `new SendDeleteEventDefinitionPropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SendDeleteEventDefinitionPropertyParams::with(eventName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SendDeleteEventDefinitionPropertyParams)->withEventName(...)
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
