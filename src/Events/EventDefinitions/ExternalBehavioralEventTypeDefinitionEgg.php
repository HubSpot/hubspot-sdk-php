<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalBehavioralEventPropertyCreateShape from \HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventPropertyCreate
 *
 * @phpstan-type ExternalBehavioralEventTypeDefinitionEggShape = array{
 *   label: string,
 *   propertyDefinitions: list<ExternalBehavioralEventPropertyCreateShape>,
 *   description?: string|null,
 *   name?: string|null,
 *   primaryObject?: string|null,
 * }
 */
final class ExternalBehavioralEventTypeDefinitionEgg implements BaseModel
{
    /** @use SdkModel<ExternalBehavioralEventTypeDefinitionEggShape> */
    use SdkModel;

    /**
     * Human readable label for the event. Used in HubSpot UI.
     */
    #[Required]
    public string $label;

    /**
     * List of custom properties on event.
     *
     * @var list<ExternalBehavioralEventPropertyCreate> $propertyDefinitions
     */
    #[Required(list: ExternalBehavioralEventPropertyCreate::class)]
    public array $propertyDefinitions;

    /**
     * A description of the event that will be shown as help text in HubSpot.
     */
    #[Optional]
    public ?string $description;

    /**
     * Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     */
    #[Optional]
    public ?string $name;

    /**
     * The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     */
    #[Optional]
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
     * @param list<ExternalBehavioralEventPropertyCreateShape> $propertyDefinitions
     */
    public static function with(
        string $label,
        array $propertyDefinitions,
        ?string $description = null,
        ?string $name = null,
        ?string $primaryObject = null,
    ): self {
        $self = new self;

        $self['label'] = $label;
        $self['propertyDefinitions'] = $propertyDefinitions;

        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $primaryObject && $self['primaryObject'] = $primaryObject;

        return $self;
    }

    /**
     * Human readable label for the event. Used in HubSpot UI.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * List of custom properties on event.
     *
     * @param list<ExternalBehavioralEventPropertyCreateShape> $propertyDefinitions
     */
    public function withPropertyDefinitions(array $propertyDefinitions): self
    {
        $self = clone $this;
        $self['propertyDefinitions'] = $propertyDefinitions;

        return $self;
    }

    /**
     * A description of the event that will be shown as help text in HubSpot.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Internal event name, which must be used when referencing the event from this event definitions API. If a name is not supplied, one will be generated based on the label. The `name` value will also be used to automatically generate a `fullyQualifiedName` for the event definition, which you'll use when sending event completions to this event.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The object type to associate this event to. Can be one of CONTACT, COMPANY, DEAL, TICKET. If no primaryObject is supplied, we will default to associating the event to CONTACT objects.
     */
    public function withPrimaryObject(string $primaryObject): self
    {
        $self = clone $this;
        $self['primaryObject'] = $primaryObject;

        return $self;
    }
}
