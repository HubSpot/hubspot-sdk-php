<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type external_behavioral_event_type_definition_egg = array{
 *   label: string,
 *   propertyDefinitions: list<ExternalBehavioralEventPropertyCreate>,
 *   description?: string,
 *   name?: string,
 *   primaryObject?: string,
 * }
 */
final class ExternalBehavioralEventTypeDefinitionEgg implements BaseModel
{
    /** @use SdkModel<external_behavioral_event_type_definition_egg> */
    use SdkModel;

    /**
     * Human readable label for the event. Used in HubSpot UI.
     */
    #[Api]
    public string $label;

    /**
     * List of custom properties on event.
     *
     * @var list<ExternalBehavioralEventPropertyCreate> $propertyDefinitions
     */
    #[Api(list: ExternalBehavioralEventPropertyCreate::class)]
    public array $propertyDefinitions;

    /**
     * A description of the event that will be shown as help text in HubSpot.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     */
    #[Api(optional: true)]
    public ?string $primaryObject;

    /**
     * `new ExternalBehavioralEventTypeDefinitionEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalBehavioralEventTypeDefinitionEgg::with(
     *   label: ..., propertyDefinitions: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalBehavioralEventTypeDefinitionEgg)
     *   ->withLabel(...)
     *   ->withPropertyDefinitions(...)
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
     * @param list<ExternalBehavioralEventPropertyCreate> $propertyDefinitions
     */
    public static function with(
        string $label,
        array $propertyDefinitions,
        ?string $description = null,
        ?string $name = null,
        ?string $primaryObject = null,
    ): self {
        $obj = new self;

        $obj->label = $label;
        $obj->propertyDefinitions = $propertyDefinitions;

        null !== $description && $obj->description = $description;
        null !== $name && $obj->name = $name;
        null !== $primaryObject && $obj->primaryObject = $primaryObject;

        return $obj;
    }

    /**
     * Human readable label for the event. Used in HubSpot UI.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * List of custom properties on event.
     *
     * @param list<ExternalBehavioralEventPropertyCreate> $propertyDefinitions
     */
    public function withPropertyDefinitions(array $propertyDefinitions): self
    {
        $obj = clone $this;
        $obj->propertyDefinitions = $propertyDefinitions;

        return $obj;
    }

    /**
     * A description of the event that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     */
    public function withPrimaryObject(string $primaryObject): self
    {
        $obj = clone $this;
        $obj->primaryObject = $primaryObject;

        return $obj;
    }
}
