<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\NumberDisplayHint;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\OptionSortStrategy;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\TextDisplayHint;
use HubspotSDK\Crm\Objects\Schemas\ObjectTypePropertyCreate\Type;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\OptionInput;

/**
 * Defines a new object type, its properties, and associations.
 *
 * @phpstan-type ObjectSchemaEggShape = array{
 *   associatedObjects: list<string>,
 *   labels: ObjectTypeDefinitionLabels,
 *   name: string,
 *   properties: list<ObjectTypePropertyCreate>,
 *   requiredProperties: list<string>,
 *   description?: string|null,
 *   primaryDisplayProperty?: string|null,
 *   searchableProperties?: list<string>|null,
 *   secondaryDisplayProperties?: list<string>|null,
 * }
 */
final class ObjectSchemaEgg implements BaseModel
{
    /** @use SdkModel<ObjectSchemaEggShape> */
    use SdkModel;

    /**
     * Associations defined for this object type.
     *
     * @var list<string> $associatedObjects
     */
    #[Required(list: 'string')]
    public array $associatedObjects;

    #[Required]
    public ObjectTypeDefinitionLabels $labels;

    /**
     * A unique name for this object. For internal use only.
     */
    #[Required]
    public string $name;

    /**
     * Properties defined for this object type.
     *
     * @var list<ObjectTypePropertyCreate> $properties
     */
    #[Required(list: ObjectTypePropertyCreate::class)]
    public array $properties;

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @var list<string> $requiredProperties
     */
    #[Required(list: 'string')]
    public array $requiredProperties;

    #[Optional]
    public ?string $description;

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    #[Optional]
    public ?string $primaryDisplayProperty;

    /**
     * Names of properties that will be indexed for this object type in by HubSpot's product search.
     *
     * @var list<string>|null $searchableProperties
     */
    #[Optional(list: 'string')]
    public ?array $searchableProperties;

    /**
     * The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @var list<string>|null $secondaryDisplayProperties
     */
    #[Optional(list: 'string')]
    public ?array $secondaryDisplayProperties;

    /**
     * `new ObjectSchemaEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchemaEgg::with(
     *   associatedObjects: ...,
     *   labels: ...,
     *   name: ...,
     *   properties: ...,
     *   requiredProperties: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectSchemaEgg)
     *   ->withAssociatedObjects(...)
     *   ->withLabels(...)
     *   ->withName(...)
     *   ->withProperties(...)
     *   ->withRequiredProperties(...)
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
     * @param list<string> $associatedObjects
     * @param ObjectTypeDefinitionLabels|array{
     *   plural?: string|null, singular?: string|null
     * } $labels
     * @param list<ObjectTypePropertyCreate|array{
     *   fieldType: string,
     *   label: string,
     *   name: string,
     *   type: value-of<Type>,
     *   description?: string|null,
     *   displayOrder?: int|null,
     *   formField?: bool|null,
     *   groupName?: string|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   numberDisplayHint?: value-of<NumberDisplayHint>|null,
     *   options?: list<OptionInput>|null,
     *   optionSortStrategy?: value-of<OptionSortStrategy>|null,
     *   referencedObjectType?: string|null,
     *   searchableInGlobalSearch?: bool|null,
     *   showCurrencySymbol?: bool|null,
     *   textDisplayHint?: value-of<TextDisplayHint>|null,
     * }> $properties
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        array $associatedObjects,
        ObjectTypeDefinitionLabels|array $labels,
        string $name,
        array $properties,
        array $requiredProperties,
        ?string $description = null,
        ?string $primaryDisplayProperty = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
    ): self {
        $self = new self;

        $self['associatedObjects'] = $associatedObjects;
        $self['labels'] = $labels;
        $self['name'] = $name;
        $self['properties'] = $properties;
        $self['requiredProperties'] = $requiredProperties;

        null !== $description && $self['description'] = $description;
        null !== $primaryDisplayProperty && $self['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $searchableProperties && $self['searchableProperties'] = $searchableProperties;
        null !== $secondaryDisplayProperties && $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $self;
    }

    /**
     * Associations defined for this object type.
     *
     * @param list<string> $associatedObjects
     */
    public function withAssociatedObjects(array $associatedObjects): self
    {
        $self = clone $this;
        $self['associatedObjects'] = $associatedObjects;

        return $self;
    }

    /**
     * @param ObjectTypeDefinitionLabels|array{
     *   plural?: string|null, singular?: string|null
     * } $labels
     */
    public function withLabels(ObjectTypeDefinitionLabels|array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * A unique name for this object. For internal use only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Properties defined for this object type.
     *
     * @param list<ObjectTypePropertyCreate|array{
     *   fieldType: string,
     *   label: string,
     *   name: string,
     *   type: value-of<Type>,
     *   description?: string|null,
     *   displayOrder?: int|null,
     *   formField?: bool|null,
     *   groupName?: string|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   numberDisplayHint?: value-of<NumberDisplayHint>|null,
     *   options?: list<OptionInput>|null,
     *   optionSortStrategy?: value-of<OptionSortStrategy>|null,
     *   referencedObjectType?: string|null,
     *   searchableInGlobalSearch?: bool|null,
     *   showCurrencySymbol?: bool|null,
     *   textDisplayHint?: value-of<TextDisplayHint>|null,
     * }> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $self = clone $this;
        $self['requiredProperties'] = $requiredProperties;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $self = clone $this;
        $self['primaryDisplayProperty'] = $primaryDisplayProperty;

        return $self;
    }

    /**
     * Names of properties that will be indexed for this object type in by HubSpot's product search.
     *
     * @param list<string> $searchableProperties
     */
    public function withSearchableProperties(array $searchableProperties): self
    {
        $self = clone $this;
        $self['searchableProperties'] = $searchableProperties;

        return $self;
    }

    /**
     * The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @param list<string> $secondaryDisplayProperties
     */
    public function withSecondaryDisplayProperties(
        array $secondaryDisplayProperties
    ): self {
        $self = clone $this;
        $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $self;
    }
}
