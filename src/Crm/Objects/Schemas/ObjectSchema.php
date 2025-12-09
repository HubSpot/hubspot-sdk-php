<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
 *   createdByUserID?: int|null,
 *   description?: string|null,
 *   fullyQualifiedName?: string|null,
 *   objectTypeID?: string|null,
 *   primaryDisplayProperty?: string|null,
 *   searchableProperties?: list<string>|null,
 *   secondaryDisplayProperties?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedByUserID?: int|null,
 * }
 */
final class ObjectSchema implements BaseModel
{
    /** @use SdkModel<ObjectSchemaShape> */
    use SdkModel;

    /**
     * A unique ID for this schema's object type. Will be defined as {meta-type}-{unique ID}.
     */
    #[Required]
    public string $id;

    /**
     * Associations defined for a given object type.
     *
     * @var list<AssociationDefinition> $associations
     */
    #[Required(list: AssociationDefinition::class)]
    public array $associations;

    #[Required]
    public ObjectTypeDefinitionLabels $labels;

    /**
     * A unique name for the schema's object type.
     */
    #[Required]
    public string $name;

    /**
     * Properties defined for this object type.
     *
     * @var list<Property> $properties
     */
    #[Required(list: Property::class)]
    public array $properties;

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @var list<string> $requiredProperties
     */
    #[Required(list: 'string')]
    public array $requiredProperties;

    #[Optional]
    public ?bool $archived;

    /**
     * When the object schema was created.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional('createdByUserId')]
    public ?int $createdByUserID;

    #[Optional]
    public ?string $description;

    /**
     * An assigned unique ID for the object, including portal ID and object name.
     */
    #[Optional]
    public ?string $fullyQualifiedName;

    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

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
     * When the object schema was last updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('updatedByUserId')]
    public ?int $updatedByUserID;

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
     *   fromObjectTypeID: string,
     *   hasAllAssociatedObjects: bool,
     *   hasCascadingDeletes: bool,
     *   hasUserEnforcedMaxFromObjectIDs: bool,
     *   hasUserEnforcedMaxToObjectIDs: bool,
     *   hidden: bool,
     *   inverseAllowsCustomLabels: bool,
     *   inverseCardinality: value-of<InverseCardinality>,
     *   inverseHasAllAssociatedObjects: bool,
     *   inverseID: int,
     *   inverseName: string,
     *   isInversePrimary: bool,
     *   isPrimary: bool,
     *   maxFromObjectIDs: int,
     *   maxToObjectIDs: int,
     *   name: string,
     *   portalUniqueIdentifier: string,
     *   toObjectTypeID: string,
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
     *   createdUserID?: string|null,
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
     *   updatedUserID?: string|null,
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
        ?int $createdByUserID = null,
        ?string $description = null,
        ?string $fullyQualifiedName = null,
        ?string $objectTypeID = null,
        ?string $primaryDisplayProperty = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $updatedByUserID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['associations'] = $associations;
        $self['labels'] = $labels;
        $self['name'] = $name;
        $self['properties'] = $properties;
        $self['requiredProperties'] = $requiredProperties;

        null !== $archived && $self['archived'] = $archived;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdByUserID && $self['createdByUserID'] = $createdByUserID;
        null !== $description && $self['description'] = $description;
        null !== $fullyQualifiedName && $self['fullyQualifiedName'] = $fullyQualifiedName;
        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;
        null !== $primaryDisplayProperty && $self['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $searchableProperties && $self['searchableProperties'] = $searchableProperties;
        null !== $secondaryDisplayProperties && $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedByUserID && $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }

    /**
     * A unique ID for this schema's object type. Will be defined as {meta-type}-{unique ID}.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Associations defined for a given object type.
     *
     * @param list<AssociationDefinition|array{
     *   id: int,
     *   allowsCustomLabels: bool,
     *   cardinality: value-of<Cardinality>,
     *   category: value-of<Category>,
     *   fromObjectTypeID: string,
     *   hasAllAssociatedObjects: bool,
     *   hasCascadingDeletes: bool,
     *   hasUserEnforcedMaxFromObjectIDs: bool,
     *   hasUserEnforcedMaxToObjectIDs: bool,
     *   hidden: bool,
     *   inverseAllowsCustomLabels: bool,
     *   inverseCardinality: value-of<InverseCardinality>,
     *   inverseHasAllAssociatedObjects: bool,
     *   inverseID: int,
     *   inverseName: string,
     *   isInversePrimary: bool,
     *   isPrimary: bool,
     *   maxFromObjectIDs: int,
     *   maxToObjectIDs: int,
     *   name: string,
     *   portalUniqueIdentifier: string,
     *   toObjectTypeID: string,
     *   fromObjectType?: value-of<FromObjectType>|null,
     *   inverseLabel?: string|null,
     *   label?: string|null,
     *   toObjectType?: value-of<ToObjectType>|null,
     * }> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

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
     * A unique name for the schema's object type.
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
     *   createdUserID?: string|null,
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
     *   updatedUserID?: string|null,
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

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * When the object schema was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreatedByUserID(int $createdByUserID): self
    {
        $self = clone $this;
        $self['createdByUserID'] = $createdByUserID;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * An assigned unique ID for the object, including portal ID and object name.
     */
    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $self = clone $this;
        $self['fullyQualifiedName'] = $fullyQualifiedName;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

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

    /**
     * When the object schema was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $self = clone $this;
        $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }
}
