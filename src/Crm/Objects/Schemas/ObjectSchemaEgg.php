<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
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
    #[Api(list: 'string')]
    public array $associatedObjects;

    #[Api]
    public ObjectTypeDefinitionLabels $labels;

    /**
     * A unique name for this object. For internal use only.
     */
    #[Api]
    public string $name;

    /**
     * Properties defined for this object type.
     *
     * @var list<ObjectTypePropertyCreate> $properties
     */
    #[Api(list: ObjectTypePropertyCreate::class)]
    public array $properties;

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @var list<string> $requiredProperties
     */
    #[Api(list: 'string')]
    public array $requiredProperties;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

    /**
     * Names of properties that will be indexed for this object type in by HubSpot's product search.
     *
     * @var list<string>|null $searchableProperties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $searchableProperties;

    /**
     * The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @var list<string>|null $secondaryDisplayProperties
     */
    #[Api(list: 'string', optional: true)]
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
        $obj = new self;

        $obj['associatedObjects'] = $associatedObjects;
        $obj['labels'] = $labels;
        $obj['name'] = $name;
        $obj['properties'] = $properties;
        $obj['requiredProperties'] = $requiredProperties;

        null !== $description && $obj['description'] = $description;
        null !== $primaryDisplayProperty && $obj['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $searchableProperties && $obj['searchableProperties'] = $searchableProperties;
        null !== $secondaryDisplayProperties && $obj['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $obj;
    }

    /**
     * Associations defined for this object type.
     *
     * @param list<string> $associatedObjects
     */
    public function withAssociatedObjects(array $associatedObjects): self
    {
        $obj = clone $this;
        $obj['associatedObjects'] = $associatedObjects;

        return $obj;
    }

    /**
     * @param ObjectTypeDefinitionLabels|array{
     *   plural?: string|null, singular?: string|null
     * } $labels
     */
    public function withLabels(ObjectTypeDefinitionLabels|array $labels): self
    {
        $obj = clone $this;
        $obj['labels'] = $labels;

        return $obj;
    }

    /**
     * A unique name for this object. For internal use only.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
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
        $obj = clone $this;
        $obj['properties'] = $properties;

        return $obj;
    }

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $obj = clone $this;
        $obj['requiredProperties'] = $requiredProperties;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $obj = clone $this;
        $obj['primaryDisplayProperty'] = $primaryDisplayProperty;

        return $obj;
    }

    /**
     * Names of properties that will be indexed for this object type in by HubSpot's product search.
     *
     * @param list<string> $searchableProperties
     */
    public function withSearchableProperties(array $searchableProperties): self
    {
        $obj = clone $this;
        $obj['searchableProperties'] = $searchableProperties;

        return $obj;
    }

    /**
     * The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @param list<string> $secondaryDisplayProperties
     */
    public function withSecondaryDisplayProperties(
        array $secondaryDisplayProperties
    ): self {
        $obj = clone $this;
        $obj['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $obj;
    }
}
