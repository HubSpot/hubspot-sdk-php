<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\Cardinality;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\Category;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\FromObjectType;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\InverseCardinality;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\ToObjectType;
use HubspotSDK\Events\EventDefinitions\ComboEventRuleBranch\OperationType;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition\TrackingType;
use HubspotSDK\Option;
use HubspotSDK\Property;
use HubspotSDK\Property\DataSensitivity;
use HubspotSDK\PropertyModificationMetadata;

/**
 * @phpstan-type ExternalBehavioralEventTypeDefinitionShape = array{
 *   id: string,
 *   archived: bool,
 *   associations: list<AssociationDefinition>,
 *   fullyQualifiedName: string,
 *   labels: BehavioralEventTypeDefinitionLabels,
 *   name: string,
 *   objectTypeID: string,
 *   properties: list<Property>,
 *   comboEventRules?: ComboEventRuleBranch|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdUserID?: int|null,
 *   description?: string|null,
 *   primaryObject?: string|null,
 *   primaryObjectID?: string|null,
 *   trackingType?: value-of<TrackingType>|null,
 * }
 */
final class ExternalBehavioralEventTypeDefinition implements BaseModel
{
    /** @use SdkModel<ExternalBehavioralEventTypeDefinitionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $archived;

    /** @var list<AssociationDefinition> $associations */
    #[Required(list: AssociationDefinition::class)]
    public array $associations;

    #[Required]
    public string $fullyQualifiedName;

    #[Required]
    public BehavioralEventTypeDefinitionLabels $labels;

    #[Required]
    public string $name;

    #[Required('objectTypeId')]
    public string $objectTypeID;

    /** @var list<Property> $properties */
    #[Required(list: Property::class)]
    public array $properties;

    #[Optional]
    public ?ComboEventRuleBranch $comboEventRules;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional('createdUserId')]
    public ?int $createdUserID;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $primaryObject;

    #[Optional('primaryObjectId')]
    public ?string $primaryObjectID;

    /** @var value-of<TrackingType>|null $trackingType */
    #[Optional(enum: TrackingType::class)]
    public ?string $trackingType;

    /**
     * `new ExternalBehavioralEventTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalBehavioralEventTypeDefinition::with(
     *   id: ...,
     *   archived: ...,
     *   associations: ...,
     *   fullyQualifiedName: ...,
     *   labels: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   properties: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalBehavioralEventTypeDefinition)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withAssociations(...)
     *   ->withFullyQualifiedName(...)
     *   ->withLabels(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
     *   ->withProperties(...)
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
     * @param BehavioralEventTypeDefinitionLabels|array{
     *   singular: string, plural?: string|null
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
     * @param ComboEventRuleBranch|array{
     *   composingRules: list<ComboEventRule>,
     *   operationType: value-of<OperationType>,
     *   ruleBranches: list<mixed>,
     * } $comboEventRules
     * @param TrackingType|value-of<TrackingType> $trackingType
     */
    public static function with(
        string $id,
        bool $archived,
        array $associations,
        string $fullyQualifiedName,
        BehavioralEventTypeDefinitionLabels|array $labels,
        string $name,
        string $objectTypeID,
        array $properties,
        ComboEventRuleBranch|array|null $comboEventRules = null,
        ?\DateTimeInterface $createdAt = null,
        ?int $createdUserID = null,
        ?string $description = null,
        ?string $primaryObject = null,
        ?string $primaryObjectID = null,
        TrackingType|string|null $trackingType = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['associations'] = $associations;
        $self['fullyQualifiedName'] = $fullyQualifiedName;
        $self['labels'] = $labels;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['properties'] = $properties;

        null !== $comboEventRules && $self['comboEventRules'] = $comboEventRules;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdUserID && $self['createdUserID'] = $createdUserID;
        null !== $description && $self['description'] = $description;
        null !== $primaryObject && $self['primaryObject'] = $primaryObject;
        null !== $primaryObjectID && $self['primaryObjectID'] = $primaryObjectID;
        null !== $trackingType && $self['trackingType'] = $trackingType;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
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

    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $self = clone $this;
        $self['fullyQualifiedName'] = $fullyQualifiedName;

        return $self;
    }

    /**
     * @param BehavioralEventTypeDefinitionLabels|array{
     *   singular: string, plural?: string|null
     * } $labels
     */
    public function withLabels(
        BehavioralEventTypeDefinitionLabels|array $labels
    ): self {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
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
     * @param ComboEventRuleBranch|array{
     *   composingRules: list<ComboEventRule>,
     *   operationType: value-of<OperationType>,
     *   ruleBranches: list<mixed>,
     * } $comboEventRules
     */
    public function withComboEventRules(
        ComboEventRuleBranch|array $comboEventRules
    ): self {
        $self = clone $this;
        $self['comboEventRules'] = $comboEventRules;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withCreatedUserID(int $createdUserID): self
    {
        $self = clone $this;
        $self['createdUserID'] = $createdUserID;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withPrimaryObject(string $primaryObject): self
    {
        $self = clone $this;
        $self['primaryObject'] = $primaryObject;

        return $self;
    }

    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $self = clone $this;
        $self['primaryObjectID'] = $primaryObjectID;

        return $self;
    }

    /**
     * @param TrackingType|value-of<TrackingType> $trackingType
     */
    public function withTrackingType(TrackingType|string $trackingType): self
    {
        $self = clone $this;
        $self['trackingType'] = $trackingType;

        return $self;
    }
}
