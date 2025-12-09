<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\Property1\DataSensitivity;
use HubspotSDK\Cms\MediaBridge\Property1\DateDisplayHint;
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
use HubspotSDK\PropertyModificationMetadata;

/**
 * @phpstan-type ObjectSchemaShape = array{
 *   id: string,
 *   allowsSensitiveProperties: bool,
 *   archived: bool,
 *   associations: list<AssociationDefinition>,
 *   fullyQualifiedName: string,
 *   labels: ObjectTypeDefinitionLabels,
 *   name: string,
 *   objectTypeId: string,
 *   properties: list<Property1>,
 *   requiredProperties: list<string>,
 *   searchableProperties: list<string>,
 *   secondaryDisplayProperties: list<string>,
 *   createdAt?: \DateTimeInterface|null,
 *   createdByUserId?: int|null,
 *   description?: string|null,
 *   primaryDisplayProperty?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedByUserId?: int|null,
 * }
 */
final class ObjectSchema implements BaseModel
{
    /** @use SdkModel<ObjectSchemaShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $allowsSensitiveProperties;

    #[Required]
    public bool $archived;

    /** @var list<AssociationDefinition> $associations */
    #[Required(list: AssociationDefinition::class)]
    public array $associations;

    #[Required]
    public string $fullyQualifiedName;

    #[Required]
    public ObjectTypeDefinitionLabels $labels;

    #[Required]
    public string $name;

    #[Required]
    public string $objectTypeId;

    /** @var list<Property1> $properties */
    #[Required(list: Property1::class)]
    public array $properties;

    /** @var list<string> $requiredProperties */
    #[Required(list: 'string')]
    public array $requiredProperties;

    /** @var list<string> $searchableProperties */
    #[Required(list: 'string')]
    public array $searchableProperties;

    /** @var list<string> $secondaryDisplayProperties */
    #[Required(list: 'string')]
    public array $secondaryDisplayProperties;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?int $createdByUserId;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $primaryDisplayProperty;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional]
    public ?int $updatedByUserId;

    /**
     * `new ObjectSchema()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchema::with(
     *   id: ...,
     *   allowsSensitiveProperties: ...,
     *   archived: ...,
     *   associations: ...,
     *   fullyQualifiedName: ...,
     *   labels: ...,
     *   name: ...,
     *   objectTypeId: ...,
     *   properties: ...,
     *   requiredProperties: ...,
     *   searchableProperties: ...,
     *   secondaryDisplayProperties: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectSchema)
     *   ->withID(...)
     *   ->withAllowsSensitiveProperties(...)
     *   ->withArchived(...)
     *   ->withAssociations(...)
     *   ->withFullyQualifiedName(...)
     *   ->withLabels(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
     *   ->withProperties(...)
     *   ->withRequiredProperties(...)
     *   ->withSearchableProperties(...)
     *   ->withSecondaryDisplayProperties(...)
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
     * @param list<Property1|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option1>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserId?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   dateDisplayHint?: value-of<DateDisplayHint>|null,
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
        bool $allowsSensitiveProperties,
        bool $archived,
        array $associations,
        string $fullyQualifiedName,
        ObjectTypeDefinitionLabels|array $labels,
        string $name,
        string $objectTypeId,
        array $properties,
        array $requiredProperties,
        array $searchableProperties,
        array $secondaryDisplayProperties,
        ?\DateTimeInterface $createdAt = null,
        ?int $createdByUserId = null,
        ?string $description = null,
        ?string $primaryDisplayProperty = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $updatedByUserId = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['allowsSensitiveProperties'] = $allowsSensitiveProperties;
        $obj['archived'] = $archived;
        $obj['associations'] = $associations;
        $obj['fullyQualifiedName'] = $fullyQualifiedName;
        $obj['labels'] = $labels;
        $obj['name'] = $name;
        $obj['objectTypeId'] = $objectTypeId;
        $obj['properties'] = $properties;
        $obj['requiredProperties'] = $requiredProperties;
        $obj['searchableProperties'] = $searchableProperties;
        $obj['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $createdByUserId && $obj['createdByUserId'] = $createdByUserId;
        null !== $description && $obj['description'] = $description;
        null !== $primaryDisplayProperty && $obj['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $updatedByUserId && $obj['updatedByUserId'] = $updatedByUserId;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $obj = clone $this;
        $obj['allowsSensitiveProperties'] = $allowsSensitiveProperties;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
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

    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $obj = clone $this;
        $obj['fullyQualifiedName'] = $fullyQualifiedName;

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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj['objectTypeId'] = $objectTypeID;

        return $obj;
    }

    /**
     * @param list<Property1|array{
     *   description: string,
     *   fieldType: string,
     *   groupName: string,
     *   label: string,
     *   name: string,
     *   options: list<Option1>,
     *   type: string,
     *   archived?: bool|null,
     *   archivedAt?: \DateTimeInterface|null,
     *   calculated?: bool|null,
     *   calculationFormula?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   createdUserId?: string|null,
     *   dataSensitivity?: value-of<DataSensitivity>|null,
     *   dateDisplayHint?: value-of<DateDisplayHint>|null,
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
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $obj = clone $this;
        $obj['requiredProperties'] = $requiredProperties;

        return $obj;
    }

    /**
     * @param list<string> $searchableProperties
     */
    public function withSearchableProperties(array $searchableProperties): self
    {
        $obj = clone $this;
        $obj['searchableProperties'] = $searchableProperties;

        return $obj;
    }

    /**
     * @param list<string> $secondaryDisplayProperties
     */
    public function withSecondaryDisplayProperties(
        array $secondaryDisplayProperties
    ): self {
        $obj = clone $this;
        $obj['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $obj;
    }

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

    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $obj = clone $this;
        $obj['primaryDisplayProperty'] = $primaryDisplayProperty;

        return $obj;
    }

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
