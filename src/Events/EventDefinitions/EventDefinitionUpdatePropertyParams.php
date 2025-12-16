<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\OptionInput;

/**
 * Update an existing property in a custom event definition.
 *
 * @see HubspotSDK\Services\Events\EventDefinitionsService::updateProperty()
 *
 * @phpstan-import-type OptionInputShape from \HubspotSDK\OptionInput
 *
 * @phpstan-type EventDefinitionUpdatePropertyParamsShape = array{
 *   eventName: string,
 *   description?: string|null,
 *   label?: string|null,
 *   options?: list<OptionInputShape>|null,
 * }
 */
final class EventDefinitionUpdatePropertyParams implements BaseModel
{
    /** @use SdkModel<EventDefinitionUpdatePropertyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $eventName;

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * Human readable label for the property. Used in HubSpot UI.
     */
    #[Optional]
    public ?string $label;

    /**
     * A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @var list<OptionInput>|null $options
     */
    #[Optional(list: OptionInput::class)]
    public ?array $options;

    /**
     * `new EventDefinitionUpdatePropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EventDefinitionUpdatePropertyParams::with(eventName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EventDefinitionUpdatePropertyParams)->withEventName(...)
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
     * @param list<OptionInputShape> $options
     */
    public static function with(
        string $eventName,
        ?string $description = null,
        ?string $label = null,
        ?array $options = null,
    ): self {
        $self = new self;

        $self['eventName'] = $eventName;

        null !== $description && $self['description'] = $description;
        null !== $label && $self['label'] = $label;
        null !== $options && $self['options'] = $options;

        return $self;
    }

    public function withEventName(string $eventName): self
    {
        $self = clone $this;
        $self['eventName'] = $eventName;

        return $self;
    }

    /**
     * A description of the property that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Human readable label for the property. Used in HubSpot UI.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * A list of available options for the property if it is an enumeration. NOTE: This field is only applicable for enumerated properties.
     *
     * @param list<OptionInputShape> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

        return $self;
    }
}
