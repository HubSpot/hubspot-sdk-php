<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\Cardinality;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\Category;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\FromObjectType;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\InverseCardinality;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\ToObjectType;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\Option;
use HubspotSDK\Property;
use HubspotSDK\Property\DataSensitivity;
use HubspotSDK\PropertyModificationMetadata;

/**
 * Defines an object schema, including its properties and associations.
 *
 * @phpstan-type ObjectSchemaShape = array{
 *   id: string,
 *   associations: list<AssociationDefinition>,
 *   labels: ObjectTypeDefinitionLabels,
 *   name: string,
 *   properties: list<Property>,
 *   requiredProperties: list<string>,
 *   archived?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdByUserId?: int|null,
 *   description?: string|null,
 *   fullyQualifiedName?: string|null,
 *   objectTypeId?: string|null,
 *   primaryDisplayProperty?: string|null,
 *   searchableProperties?: list<string>|null,
 *   secondaryDisplayProperties?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedByUserId?: int|null,
 * }
 */
final class ObjectSchema implements BaseModel
{
    /** @use SdkModel<ObjectSchemaShape> */
    use SdkModel;

    /**
     * A unique ID for this schema's object type. Will be defined as {meta-type}-{unique ID}.
     */
    #[Api]
    public string $id;

    /**
     * Associations defined for a given object type.
     *
     * @var list<AssociationDefinition> $associations
     */
    #[Api(list: AssociationDefinition::class)]
    public array $associations;

    #[Api]
    public ObjectTypeDefinitionLabels $labels;

    /**
     * A unique name for the schema's object type.
     */
    #[Api]
    public string $name;

    /**
     * Properties defined for this object type.
     *
     * @var list<Property> $properties
     */
    #[Api(list: Property::class)]
    public array $properties;

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @var list<string> $requiredProperties
     */
    #[Api(list: 'string')]
    public array $requiredProperties;

    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * When the object schema was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?int $createdByUserId;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * An assigned unique ID for the object, including portal ID and object name.
     */
    #[Api(optional: true)]
    public ?string $fullyQualifiedName;

    #[Api(optional: true)]
    public ?string $objectTypeId;

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
     * When the object schema was last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api(optional: true)]
    public ?int $updatedByUserId;

    /**
     * `new ObjectSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchema::with(
     *   id: ...,
     *   associations: ...,
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
     * (new ObjectSchema)
     *   ->withID(...)
     *   ->withAssociations(...)
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
     * @param list<AssociationDefinition|array{
     *   id: int,
     *   allowsCustomLabels: bool,
     *   cardinality: value-of<Cardinality>,
     *   category: value-of<Category>,
     *   fromObjectTypeId: string,
     *   hasAllAssociatedObjects: bool,
     *   hasCascadingDeletes: bool,
     *   hasUserEnforcedMaxFromObjectIds: bool,
     *   hasUserEnforcedMaxToObjectIds: bool,
     *   hidden: bool,
     *   inverseAllowsCustomLabels: bool,
     *   inverseCardinality: value-of<InverseCardinality>,
     *   inverseHasAllAssociatedObjects: bool,
     *   inverseId: int,
     *   inverseName: string,
     *   isInversePrimary: bool,
     *   isPrimary: bool,
     *   maxFromObjectIds: int,
     *   maxToObjectIds: int,
     *   name: string,
     *   portalUniqueIdentifier: string,
     *   toObjectTypeId: string,
     *   fromObjectType?: value-of<FromObjectType>|null,
     *   inverseLabel?: string|null,
     *   label?: string|null,
     *   toObjectType?: value-of<ToObjectType>|null,
     * }> $associations
     * @param ObjectTypeDefinitionLabels|array{
     *   plural?: string|null, singular?: string|null
     * } $labels
     * @param list<Property|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserId?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   displayOrder?: int|null,
     *   externalOptions?: bool|null,
     *   formField?: bool|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   hubspotDefined?: bool|null,
     *   modificationMetadata?: PropertyModificationMetadata|null,
     *   referencedObjectType?: string|null,
     *   sensitiveDataCategories?: list<string>|null,
     *   showCurrencySymbol?: bool|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedUserId?: string|null,
     * }> $properties
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        string $id,
        array $associations,
        ObjectTypeDefinitionLabels|array $labels,
        string $name,
        array $properties,
        array $requiredProperties,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAt = null,
        ?int $createdByUserId = null,
        ?string $description = null,
        ?string $fullyQualifiedName = null,
        ?string $objectTypeId = null,
        ?string $primaryDisplayProperty = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $updatedByUserId = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['associations'] = $associations;
        $obj['labels'] = $labels;
        $obj['name'] = $name;
        $obj['properties'] = $properties;
        $obj['requiredProperties'] = $requiredProperties;

        null !== $archived && $obj['archived'] = $archived;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $createdByUserId && $obj['createdByUserId'] = $createdByUserId;
        null !== $description && $obj['description'] = $description;
        null !== $fullyQualifiedName && $obj['fullyQualifiedName'] = $fullyQualifiedName;
        null !== $objectTypeId && $obj['objectTypeId'] = $objectTypeId;
        null !== $primaryDisplayProperty && $obj['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $searchableProperties && $obj['searchableProperties'] = $searchableProperties;
        null !== $secondaryDisplayProperties && $obj['secondaryDisplayProperties'] = $secondaryDisplayProperties;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $updatedByUserId && $obj['updatedByUserId'] = $updatedByUserId;

        return $obj;
    }

    /**
     * A unique ID for this schema's object type. Will be defined as {meta-type}-{unique ID}.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Associations defined for a given object type.
     *
     * @param list<AssociationDefinition|array{
     *   id: int,
     *   allowsCustomLabels: bool,
     *   cardinality: value-of<Cardinality>,
     *   category: value-of<Category>,
     *   fromObjectTypeId: string,
     *   hasAllAssociatedObjects: bool,
     *   hasCascadingDeletes: bool,
     *   hasUserEnforcedMaxFromObjectIds: bool,
     *   hasUserEnforcedMaxToObjectIds: bool,
     *   hidden: bool,
     *   inverseAllowsCustomLabels: bool,
     *   inverseCardinality: value-of<InverseCardinality>,
     *   inverseHasAllAssociatedObjects: bool,
     *   inverseId: int,
     *   inverseName: string,
     *   isInversePrimary: bool,
     *   isPrimary: bool,
     *   maxFromObjectIds: int,
     *   maxToObjectIds: int,
     *   name: string,
     *   portalUniqueIdentifier: string,
     *   toObjectTypeId: string,
     *   fromObjectType?: value-of<FromObjectType>|null,
     *   inverseLabel?: string|null,
     *   label?: string|null,
     *   toObjectType?: value-of<ToObjectType>|null,
     * }> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj['associations'] = $associations;

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
     * A unique name for the schema's object type.
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
     * @param list<Property|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserId?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   displayOrder?: int|null,
     *   externalOptions?: bool|null,
     *   formField?: bool|null,
     *   hasUniqueValue?: bool|null,
     *   hidden?: bool|null,
     *   hubspotDefined?: bool|null,
     *   modificationMetadata?: PropertyModificationMetadata|null,
     *   referencedObjectType?: string|null,
     *   sensitiveDataCategories?: list<string>|null,
     *   showCurrencySymbol?: bool|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   updatedUserId?: string|null,
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

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * When the object schema was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withCreatedByUserID(int $createdByUserID): self
    {
        $obj = clone $this;
        $obj['createdByUserId'] = $createdByUserID;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * An assigned unique ID for the object, including portal ID and object name.
     */
    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $obj = clone $this;
        $obj['fullyQualifiedName'] = $fullyQualifiedName;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

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

    /**
     * When the object schema was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj['updatedByUserId'] = $updatedByUserID;

        return $obj;
    }
}
