<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\ExternalBehavioralEventPropertyCreate;
use HubspotSDK\Events\ExternalObjectResolutionMappingRequest;

/**
 * @see HubspotSDK\Services\Events\DefinitionsService::create()
 *
 * @phpstan-import-type ExternalBehavioralEventPropertyCreateShape from \HubspotSDK\Events\ExternalBehavioralEventPropertyCreate
 * @phpstan-import-type ExternalObjectResolutionMappingRequestShape from \HubspotSDK\Events\ExternalObjectResolutionMappingRequest
 *
 * @phpstan-type DefinitionCreateParamsShape = array{
 *   includeDefaultProperties: bool,
 *   label: string,
 *   propertyDefinitions: list<ExternalBehavioralEventPropertyCreate|ExternalBehavioralEventPropertyCreateShape>,
 *   customMatchingID?: null|ExternalObjectResolutionMappingRequest|ExternalObjectResolutionMappingRequestShape,
 *   description?: string|null,
 *   name?: string|null,
 *   primaryObject?: string|null,
 * }
 */
final class DefinitionCreateParams implements BaseModel
{
    /** @use SdkModel<DefinitionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public bool $includeDefaultProperties;

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

    #[Optional('customMatchingId')]
    public ?ExternalObjectResolutionMappingRequest $customMatchingID;

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
     * `new DefinitionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DefinitionCreateParams::with(
     *   includeDefaultProperties: ..., label: ..., propertyDefinitions: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DefinitionCreateParams)
     *   ->withIncludeDefaultProperties(...)
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
     * @param list<ExternalBehavioralEventPropertyCreate|ExternalBehavioralEventPropertyCreateShape> $propertyDefinitions
     * @param ExternalObjectResolutionMappingRequest|ExternalObjectResolutionMappingRequestShape|null $customMatchingID
     */
    public static function with(
        bool $includeDefaultProperties,
        string $label,
        array $propertyDefinitions,
        ExternalObjectResolutionMappingRequest|array|null $customMatchingID = null,
        ?string $description = null,
        ?string $name = null,
        ?string $primaryObject = null,
    ): self {
        $self = new self;

        $self['includeDefaultProperties'] = $includeDefaultProperties;
        $self['label'] = $label;
        $self['propertyDefinitions'] = $propertyDefinitions;

        null !== $customMatchingID && $self['customMatchingID'] = $customMatchingID;
        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $primaryObject && $self['primaryObject'] = $primaryObject;

        return $self;
    }

    public function withIncludeDefaultProperties(
        bool $includeDefaultProperties
    ): self {
        $self = clone $this;
        $self['includeDefaultProperties'] = $includeDefaultProperties;

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
     * @param list<ExternalBehavioralEventPropertyCreate|ExternalBehavioralEventPropertyCreateShape> $propertyDefinitions
     */
    public function withPropertyDefinitions(array $propertyDefinitions): self
    {
        $self = clone $this;
        $self['propertyDefinitions'] = $propertyDefinitions;

        return $self;
    }

    /**
     * @param ExternalObjectResolutionMappingRequest|ExternalObjectResolutionMappingRequestShape $customMatchingID
     */
    public function withCustomMatchingID(
        ExternalObjectResolutionMappingRequest|array $customMatchingID
    ): self {
        $self = clone $this;
        $self['customMatchingID'] = $customMatchingID;

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
