<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\AssociationDefinition\Cardinality;
use HubspotSDK\Events\AssociationDefinition\Category;
use HubspotSDK\Events\AssociationDefinition\FromObjectType;
use HubspotSDK\Events\AssociationDefinition\HiddenReason;
use HubspotSDK\Events\AssociationDefinition\InverseCardinality;
use HubspotSDK\Events\AssociationDefinition\ToObjectType;

/**
 * The definition of an association.
 *
 * @phpstan-type AssociationDefinitionShape = array{
 *   id: int,
 *   allowsCustomLabels: bool,
 *   cardinality: Cardinality|value-of<Cardinality>,
 *   category: Category|value-of<Category>,
 *   fromObjectTypeID: string,
 *   hasAllAssociatedObjects: bool,
 *   hasCascadingDeletes: bool,
 *   hasUserEnforcedMaxFromObjectIDs: bool,
 *   hasUserEnforcedMaxToObjectIDs: bool,
 *   hidden: bool,
 *   inverseAllowsCustomLabels: bool,
 *   inverseCardinality: InverseCardinality|value-of<InverseCardinality>,
 *   inverseHasAllAssociatedObjects: bool,
 *   inverseID: int,
 *   inverseName: string,
 *   isDefault: bool,
 *   isInversePrimary: bool,
 *   isPrimary: bool,
 *   maxFromObjectIDs: int,
 *   maxToObjectIDs: int,
 *   name: string,
 *   portalUniqueIdentifier: string,
 *   readOnly: bool,
 *   toObjectTypeID: string,
 *   fromObjectType?: null|FromObjectType|value-of<FromObjectType>,
 *   hiddenReason?: null|HiddenReason|value-of<HiddenReason>,
 *   inverseLabel?: string|null,
 *   label?: string|null,
 *   toObjectType?: null|ToObjectType|value-of<ToObjectType>,
 * }
 */
final class AssociationDefinition implements BaseModel
{
    /** @use SdkModel<AssociationDefinitionShape> */
    use SdkModel;

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    #[Required]
    public int $id;

    /**
     * Whether custom labels can be used in the association.
     */
    #[Required]
    public bool $allowsCustomLabels;

    /**
     * The cardinality from the source object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
     *
     * @var value-of<Cardinality> $cardinality
     */
    #[Required(enum: Cardinality::class)]
    public string $cardinality;

    /**
     * The error category.
     *
     * @var value-of<Category> $category
     */
    #[Required(enum: Category::class)]
    public string $category;

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    #[Required('fromObjectTypeId')]
    public string $fromObjectTypeID;

    /**
     * Whether all potential linked objects are included in the association.
     */
    #[Required]
    public bool $hasAllAssociatedObjects;

    /**
     * Whether deletions in the association should cause cascading deletes to linked objects.
     */
    #[Required]
    public bool $hasCascadingDeletes;

    /**
     * Whether a user has set a limit for the number of source objects.
     */
    #[Required('hasUserEnforcedMaxFromObjectIds')]
    public bool $hasUserEnforcedMaxFromObjectIDs;

    /**
     * Whether a user has set a limit for the number of destination objects.
     */
    #[Required('hasUserEnforcedMaxToObjectIds')]
    public bool $hasUserEnforcedMaxToObjectIDs;

    /**
     * Whether the association is hidden or not.
     */
    #[Required]
    public bool $hidden;

    /**
     * Whether the reverse association can also support custom labels.
     */
    #[Required]
    public bool $inverseAllowsCustomLabels;

    /**
     * The cardinality from the destination object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
     *
     * @var value-of<InverseCardinality> $inverseCardinality
     */
    #[Required(enum: InverseCardinality::class)]
    public string $inverseCardinality;

    /**
     * Whether all potential reverse linked objects are included in the association.
     */
    #[Required]
    public bool $inverseHasAllAssociatedObjects;

    /**
     * The unique ID for the inverse side of the association.
     */
    #[Required('inverseId')]
    public int $inverseID;

    /**
     * The name used to describe the inverse relationship in this association.
     */
    #[Required]
    public string $inverseName;

    #[Required]
    public bool $isDefault;

    /**
     * Whether the inverse association is considered primary.
     */
    #[Required]
    public bool $isInversePrimary;

    /**
     * Whether the association is the primary link between the entities involved.
     */
    #[Required]
    public bool $isPrimary;

    /**
     * The maximum number of source object IDs allowed in the association.
     */
    #[Required('maxFromObjectIds')]
    public int $maxFromObjectIDs;

    /**
     * The maximum number of destination object IDs allowed in the association.
     */
    #[Required('maxToObjectIds')]
    public int $maxToObjectIDs;

    /**
     * For labeled association types, the internal name of the association.
     */
    #[Required]
    public string $name;

    /**
     * A unique across-portal ID applied to the association.
     */
    #[Required]
    public string $portalUniqueIdentifier;

    #[Required]
    public bool $readOnly;

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    #[Required('toObjectTypeId')]
    public string $toObjectTypeID;

    /**
     * The name of the source object type (e.g,. "DEAL" or "QUOTE").
     *
     * @var value-of<FromObjectType>|null $fromObjectType
     */
    #[Optional(enum: FromObjectType::class)]
    public ?string $fromObjectType;

    /** @var value-of<HiddenReason>|null $hiddenReason */
    #[Optional(enum: HiddenReason::class)]
    public ?string $hiddenReason;

    /**
     * The label used to describe the reverse relationship in an association.
     */
    #[Optional]
    public ?string $inverseLabel;

    /**
     * The label given to an association.
     */
    #[Optional]
    public ?string $label;

    /**
     * The name of the destination object type (e.g,. "DEAL" or "QUOTE").
     *
     * @var value-of<ToObjectType>|null $toObjectType
     */
    #[Optional(enum: ToObjectType::class)]
    public ?string $toObjectType;

    /**
     * `new AssociationDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDefinition::with(
     *   id: ...,
     *   allowsCustomLabels: ...,
     *   cardinality: ...,
     *   category: ...,
     *   fromObjectTypeID: ...,
     *   hasAllAssociatedObjects: ...,
     *   hasCascadingDeletes: ...,
     *   hasUserEnforcedMaxFromObjectIDs: ...,
     *   hasUserEnforcedMaxToObjectIDs: ...,
     *   hidden: ...,
     *   inverseAllowsCustomLabels: ...,
     *   inverseCardinality: ...,
     *   inverseHasAllAssociatedObjects: ...,
     *   inverseID: ...,
     *   inverseName: ...,
     *   isDefault: ...,
     *   isInversePrimary: ...,
     *   isPrimary: ...,
     *   maxFromObjectIDs: ...,
     *   maxToObjectIDs: ...,
     *   name: ...,
     *   portalUniqueIdentifier: ...,
     *   readOnly: ...,
     *   toObjectTypeID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDefinition)
     *   ->withID(...)
     *   ->withAllowsCustomLabels(...)
     *   ->withCardinality(...)
     *   ->withCategory(...)
     *   ->withFromObjectTypeID(...)
     *   ->withHasAllAssociatedObjects(...)
     *   ->withHasCascadingDeletes(...)
     *   ->withHasUserEnforcedMaxFromObjectIDs(...)
     *   ->withHasUserEnforcedMaxToObjectIDs(...)
     *   ->withHidden(...)
     *   ->withInverseAllowsCustomLabels(...)
     *   ->withInverseCardinality(...)
     *   ->withInverseHasAllAssociatedObjects(...)
     *   ->withInverseID(...)
     *   ->withInverseName(...)
     *   ->withIsDefault(...)
     *   ->withIsInversePrimary(...)
     *   ->withIsPrimary(...)
     *   ->withMaxFromObjectIDs(...)
     *   ->withMaxToObjectIDs(...)
     *   ->withName(...)
     *   ->withPortalUniqueIdentifier(...)
     *   ->withReadOnly(...)
     *   ->withToObjectTypeID(...)
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
     * @param Cardinality|value-of<Cardinality> $cardinality
     * @param Category|value-of<Category> $category
     * @param InverseCardinality|value-of<InverseCardinality> $inverseCardinality
     * @param FromObjectType|value-of<FromObjectType>|null $fromObjectType
     * @param HiddenReason|value-of<HiddenReason>|null $hiddenReason
     * @param ToObjectType|value-of<ToObjectType>|null $toObjectType
     */
    public static function with(
        int $id,
        bool $allowsCustomLabels,
        Cardinality|string $cardinality,
        Category|string $category,
        string $fromObjectTypeID,
        bool $hasAllAssociatedObjects,
        bool $hasCascadingDeletes,
        bool $hasUserEnforcedMaxFromObjectIDs,
        bool $hasUserEnforcedMaxToObjectIDs,
        bool $hidden,
        bool $inverseAllowsCustomLabels,
        InverseCardinality|string $inverseCardinality,
        bool $inverseHasAllAssociatedObjects,
        int $inverseID,
        string $inverseName,
        bool $isDefault,
        bool $isInversePrimary,
        bool $isPrimary,
        int $maxFromObjectIDs,
        int $maxToObjectIDs,
        string $name,
        string $portalUniqueIdentifier,
        bool $readOnly,
        string $toObjectTypeID,
        FromObjectType|string|null $fromObjectType = null,
        HiddenReason|string|null $hiddenReason = null,
        ?string $inverseLabel = null,
        ?string $label = null,
        ToObjectType|string|null $toObjectType = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['allowsCustomLabels'] = $allowsCustomLabels;
        $self['cardinality'] = $cardinality;
        $self['category'] = $category;
        $self['fromObjectTypeID'] = $fromObjectTypeID;
        $self['hasAllAssociatedObjects'] = $hasAllAssociatedObjects;
        $self['hasCascadingDeletes'] = $hasCascadingDeletes;
        $self['hasUserEnforcedMaxFromObjectIDs'] = $hasUserEnforcedMaxFromObjectIDs;
        $self['hasUserEnforcedMaxToObjectIDs'] = $hasUserEnforcedMaxToObjectIDs;
        $self['hidden'] = $hidden;
        $self['inverseAllowsCustomLabels'] = $inverseAllowsCustomLabels;
        $self['inverseCardinality'] = $inverseCardinality;
        $self['inverseHasAllAssociatedObjects'] = $inverseHasAllAssociatedObjects;
        $self['inverseID'] = $inverseID;
        $self['inverseName'] = $inverseName;
        $self['isDefault'] = $isDefault;
        $self['isInversePrimary'] = $isInversePrimary;
        $self['isPrimary'] = $isPrimary;
        $self['maxFromObjectIDs'] = $maxFromObjectIDs;
        $self['maxToObjectIDs'] = $maxToObjectIDs;
        $self['name'] = $name;
        $self['portalUniqueIdentifier'] = $portalUniqueIdentifier;
        $self['readOnly'] = $readOnly;
        $self['toObjectTypeID'] = $toObjectTypeID;

        null !== $fromObjectType && $self['fromObjectType'] = $fromObjectType;
        null !== $hiddenReason && $self['hiddenReason'] = $hiddenReason;
        null !== $inverseLabel && $self['inverseLabel'] = $inverseLabel;
        null !== $label && $self['label'] = $label;
        null !== $toObjectType && $self['toObjectType'] = $toObjectType;

        return $self;
    }

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether custom labels can be used in the association.
     */
    public function withAllowsCustomLabels(bool $allowsCustomLabels): self
    {
        $self = clone $this;
        $self['allowsCustomLabels'] = $allowsCustomLabels;

        return $self;
    }

    /**
     * The cardinality from the source object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
     *
     * @param Cardinality|value-of<Cardinality> $cardinality
     */
    public function withCardinality(Cardinality|string $cardinality): self
    {
        $self = clone $this;
        $self['cardinality'] = $cardinality;

        return $self;
    }

    /**
     * The error category.
     *
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $self = clone $this;
        $self['fromObjectTypeID'] = $fromObjectTypeID;

        return $self;
    }

    /**
     * Whether all potential linked objects are included in the association.
     */
    public function withHasAllAssociatedObjects(
        bool $hasAllAssociatedObjects
    ): self {
        $self = clone $this;
        $self['hasAllAssociatedObjects'] = $hasAllAssociatedObjects;

        return $self;
    }

    /**
     * Whether deletions in the association should cause cascading deletes to linked objects.
     */
    public function withHasCascadingDeletes(bool $hasCascadingDeletes): self
    {
        $self = clone $this;
        $self['hasCascadingDeletes'] = $hasCascadingDeletes;

        return $self;
    }

    /**
     * Whether a user has set a limit for the number of source objects.
     */
    public function withHasUserEnforcedMaxFromObjectIDs(
        bool $hasUserEnforcedMaxFromObjectIDs
    ): self {
        $self = clone $this;
        $self['hasUserEnforcedMaxFromObjectIDs'] = $hasUserEnforcedMaxFromObjectIDs;

        return $self;
    }

    /**
     * Whether a user has set a limit for the number of destination objects.
     */
    public function withHasUserEnforcedMaxToObjectIDs(
        bool $hasUserEnforcedMaxToObjectIDs
    ): self {
        $self = clone $this;
        $self['hasUserEnforcedMaxToObjectIDs'] = $hasUserEnforcedMaxToObjectIDs;

        return $self;
    }

    /**
     * Whether the association is hidden or not.
     */
    public function withHidden(bool $hidden): self
    {
        $self = clone $this;
        $self['hidden'] = $hidden;

        return $self;
    }

    /**
     * Whether the reverse association can also support custom labels.
     */
    public function withInverseAllowsCustomLabels(
        bool $inverseAllowsCustomLabels
    ): self {
        $self = clone $this;
        $self['inverseAllowsCustomLabels'] = $inverseAllowsCustomLabels;

        return $self;
    }

    /**
     * The cardinality from the destination object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
     *
     * @param InverseCardinality|value-of<InverseCardinality> $inverseCardinality
     */
    public function withInverseCardinality(
        InverseCardinality|string $inverseCardinality
    ): self {
        $self = clone $this;
        $self['inverseCardinality'] = $inverseCardinality;

        return $self;
    }

    /**
     * Whether all potential reverse linked objects are included in the association.
     */
    public function withInverseHasAllAssociatedObjects(
        bool $inverseHasAllAssociatedObjects
    ): self {
        $self = clone $this;
        $self['inverseHasAllAssociatedObjects'] = $inverseHasAllAssociatedObjects;

        return $self;
    }

    /**
     * The unique ID for the inverse side of the association.
     */
    public function withInverseID(int $inverseID): self
    {
        $self = clone $this;
        $self['inverseID'] = $inverseID;

        return $self;
    }

    /**
     * The name used to describe the inverse relationship in this association.
     */
    public function withInverseName(string $inverseName): self
    {
        $self = clone $this;
        $self['inverseName'] = $inverseName;

        return $self;
    }

    public function withIsDefault(bool $isDefault): self
    {
        $self = clone $this;
        $self['isDefault'] = $isDefault;

        return $self;
    }

    /**
     * Whether the inverse association is considered primary.
     */
    public function withIsInversePrimary(bool $isInversePrimary): self
    {
        $self = clone $this;
        $self['isInversePrimary'] = $isInversePrimary;

        return $self;
    }

    /**
     * Whether the association is the primary link between the entities involved.
     */
    public function withIsPrimary(bool $isPrimary): self
    {
        $self = clone $this;
        $self['isPrimary'] = $isPrimary;

        return $self;
    }

    /**
     * The maximum number of source object IDs allowed in the association.
     */
    public function withMaxFromObjectIDs(int $maxFromObjectIDs): self
    {
        $self = clone $this;
        $self['maxFromObjectIDs'] = $maxFromObjectIDs;

        return $self;
    }

    /**
     * The maximum number of destination object IDs allowed in the association.
     */
    public function withMaxToObjectIDs(int $maxToObjectIDs): self
    {
        $self = clone $this;
        $self['maxToObjectIDs'] = $maxToObjectIDs;

        return $self;
    }

    /**
     * For labeled association types, the internal name of the association.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * A unique across-portal ID applied to the association.
     */
    public function withPortalUniqueIdentifier(
        string $portalUniqueIdentifier
    ): self {
        $self = clone $this;
        $self['portalUniqueIdentifier'] = $portalUniqueIdentifier;

        return $self;
    }

    public function withReadOnly(bool $readOnly): self
    {
        $self = clone $this;
        $self['readOnly'] = $readOnly;

        return $self;
    }

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $self = clone $this;
        $self['toObjectTypeID'] = $toObjectTypeID;

        return $self;
    }

    /**
     * The name of the source object type (e.g,. "DEAL" or "QUOTE").
     *
     * @param FromObjectType|value-of<FromObjectType> $fromObjectType
     */
    public function withFromObjectType(
        FromObjectType|string $fromObjectType
    ): self {
        $self = clone $this;
        $self['fromObjectType'] = $fromObjectType;

        return $self;
    }

    /**
     * @param HiddenReason|value-of<HiddenReason> $hiddenReason
     */
    public function withHiddenReason(HiddenReason|string $hiddenReason): self
    {
        $self = clone $this;
        $self['hiddenReason'] = $hiddenReason;

        return $self;
    }

    /**
     * The label used to describe the reverse relationship in an association.
     */
    public function withInverseLabel(string $inverseLabel): self
    {
        $self = clone $this;
        $self['inverseLabel'] = $inverseLabel;

        return $self;
    }

    /**
     * The label given to an association.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * The name of the destination object type (e.g,. "DEAL" or "QUOTE").
     *
     * @param ToObjectType|value-of<ToObjectType> $toObjectType
     */
    public function withToObjectType(ToObjectType|string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }
}
