<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\Cardinality;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\Category;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\FromObjectType;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\InverseCardinality;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition\ToObjectType;

/**
 * The definition of an association.
 *
 * @phpstan-type AssociationDefinitionShape = array{
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
 * }
 */
final class AssociationDefinition implements BaseModel
{
    /** @use SdkModel<AssociationDefinitionShape> */
    use SdkModel;

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    #[Api]
    public int $id;

    /**
     * Whether custom labels can be used in the association.
     */
    #[Api]
    public bool $allowsCustomLabels;

    /**
     * The cardinality from the source object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
     *
     * @var value-of<Cardinality> $cardinality
     */
    #[Api(enum: Cardinality::class)]
    public string $cardinality;

    /**
     * The category of the association. Can be: "HUBSPOT_DEFINED", "USER_DEFINED", or "INTEGRATOR_DEFINED".
     *
     * @var value-of<Category> $category
     */
    #[Api(enum: Category::class)]
    public string $category;

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    #[Api]
    public string $fromObjectTypeId;

    /**
     * Whether all potential linked objects are included in the association.
     */
    #[Api]
    public bool $hasAllAssociatedObjects;

    /**
     * Whether deletions in the association should cause cascading deletes to linked objects.
     */
    #[Api]
    public bool $hasCascadingDeletes;

    /**
     * Whether a user has set a limit for the number of source objects.
     */
    #[Api]
    public bool $hasUserEnforcedMaxFromObjectIds;

    /**
     * Whether a user has set a limit for the number of destination objects.
     */
    #[Api]
    public bool $hasUserEnforcedMaxToObjectIds;

    /**
     * Whether the association is hidden or not.
     */
    #[Api]
    public bool $hidden;

    /**
     * Whether the reverse association can also support custom labels.
     */
    #[Api]
    public bool $inverseAllowsCustomLabels;

    /**
     * The cardinality from the destination object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
     *
     * @var value-of<InverseCardinality> $inverseCardinality
     */
    #[Api(enum: InverseCardinality::class)]
    public string $inverseCardinality;

    /**
     * Whether all potential reverse linked objects are included in the association.
     */
    #[Api]
    public bool $inverseHasAllAssociatedObjects;

    /**
     * The unique ID for the inverse side of the association.
     */
    #[Api]
    public int $inverseId;

    /**
     * The name used to describe the inverse relationship in this association.
     */
    #[Api]
    public string $inverseName;

    /**
     * Whether the inverse association is considered primary.
     */
    #[Api]
    public bool $isInversePrimary;

    /**
     * Whether the association is the primary link between the entities involved.
     */
    #[Api]
    public bool $isPrimary;

    /**
     * The maximum number of source object IDs allowed in the association.
     */
    #[Api]
    public int $maxFromObjectIds;

    /**
     * The maximum number of destination object IDs allowed in the association.
     */
    #[Api]
    public int $maxToObjectIds;

    /**
     * For labeled association types, the internal name of the association.
     */
    #[Api]
    public string $name;

    /**
     * A unique across-portal ID applied to the association.
     */
    #[Api]
    public string $portalUniqueIdentifier;

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    #[Api]
    public string $toObjectTypeId;

    /**
     * The name of the source object type (e.g,. "DEAL" or "QUOTE").
     *
     * @var value-of<FromObjectType>|null $fromObjectType
     */
    #[Api(enum: FromObjectType::class, optional: true)]
    public ?string $fromObjectType;

    /**
     * The label used to describe the reverse relationship in an association.
     */
    #[Api(optional: true)]
    public ?string $inverseLabel;

    /**
     * The label given to an association.
     */
    #[Api(optional: true)]
    public ?string $label;

    /**
     * The name of the destination object type (e.g,. "DEAL" or "QUOTE").
     *
     * @var value-of<ToObjectType>|null $toObjectType
     */
    #[Api(enum: ToObjectType::class, optional: true)]
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
     *   fromObjectTypeId: ...,
     *   hasAllAssociatedObjects: ...,
     *   hasCascadingDeletes: ...,
     *   hasUserEnforcedMaxFromObjectIds: ...,
     *   hasUserEnforcedMaxToObjectIds: ...,
     *   hidden: ...,
     *   inverseAllowsCustomLabels: ...,
     *   inverseCardinality: ...,
     *   inverseHasAllAssociatedObjects: ...,
     *   inverseId: ...,
     *   inverseName: ...,
     *   isInversePrimary: ...,
     *   isPrimary: ...,
     *   maxFromObjectIds: ...,
     *   maxToObjectIds: ...,
     *   name: ...,
     *   portalUniqueIdentifier: ...,
     *   toObjectTypeId: ...,
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
     *   ->withIsInversePrimary(...)
     *   ->withIsPrimary(...)
     *   ->withMaxFromObjectIDs(...)
     *   ->withMaxToObjectIDs(...)
     *   ->withName(...)
     *   ->withPortalUniqueIdentifier(...)
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
     * @param FromObjectType|value-of<FromObjectType> $fromObjectType
     * @param ToObjectType|value-of<ToObjectType> $toObjectType
     */
    public static function with(
        int $id,
        bool $allowsCustomLabels,
        Cardinality|string $cardinality,
        Category|string $category,
        string $fromObjectTypeId,
        bool $hasAllAssociatedObjects,
        bool $hasCascadingDeletes,
        bool $hasUserEnforcedMaxFromObjectIds,
        bool $hasUserEnforcedMaxToObjectIds,
        bool $hidden,
        bool $inverseAllowsCustomLabels,
        InverseCardinality|string $inverseCardinality,
        bool $inverseHasAllAssociatedObjects,
        int $inverseId,
        string $inverseName,
        bool $isInversePrimary,
        bool $isPrimary,
        int $maxFromObjectIds,
        int $maxToObjectIds,
        string $name,
        string $portalUniqueIdentifier,
        string $toObjectTypeId,
        FromObjectType|string|null $fromObjectType = null,
        ?string $inverseLabel = null,
        ?string $label = null,
        ToObjectType|string|null $toObjectType = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['allowsCustomLabels'] = $allowsCustomLabels;
        $obj['cardinality'] = $cardinality;
        $obj['category'] = $category;
        $obj['fromObjectTypeId'] = $fromObjectTypeId;
        $obj['hasAllAssociatedObjects'] = $hasAllAssociatedObjects;
        $obj['hasCascadingDeletes'] = $hasCascadingDeletes;
        $obj['hasUserEnforcedMaxFromObjectIds'] = $hasUserEnforcedMaxFromObjectIds;
        $obj['hasUserEnforcedMaxToObjectIds'] = $hasUserEnforcedMaxToObjectIds;
        $obj['hidden'] = $hidden;
        $obj['inverseAllowsCustomLabels'] = $inverseAllowsCustomLabels;
        $obj['inverseCardinality'] = $inverseCardinality;
        $obj['inverseHasAllAssociatedObjects'] = $inverseHasAllAssociatedObjects;
        $obj['inverseId'] = $inverseId;
        $obj['inverseName'] = $inverseName;
        $obj['isInversePrimary'] = $isInversePrimary;
        $obj['isPrimary'] = $isPrimary;
        $obj['maxFromObjectIds'] = $maxFromObjectIds;
        $obj['maxToObjectIds'] = $maxToObjectIds;
        $obj['name'] = $name;
        $obj['portalUniqueIdentifier'] = $portalUniqueIdentifier;
        $obj['toObjectTypeId'] = $toObjectTypeId;

        null !== $fromObjectType && $obj['fromObjectType'] = $fromObjectType;
        null !== $inverseLabel && $obj['inverseLabel'] = $inverseLabel;
        null !== $label && $obj['label'] = $label;
        null !== $toObjectType && $obj['toObjectType'] = $toObjectType;

        return $obj;
    }

    /**
     * The unique ID of the associated object (e.g., a contact ID).
     */
    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Whether custom labels can be used in the association.
     */
    public function withAllowsCustomLabels(bool $allowsCustomLabels): self
    {
        $obj = clone $this;
        $obj['allowsCustomLabels'] = $allowsCustomLabels;

        return $obj;
    }

    /**
     * The cardinality from the source object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
     *
     * @param Cardinality|value-of<Cardinality> $cardinality
     */
    public function withCardinality(Cardinality|string $cardinality): self
    {
        $obj = clone $this;
        $obj['cardinality'] = $cardinality;

        return $obj;
    }

    /**
     * The category of the association. Can be: "HUBSPOT_DEFINED", "USER_DEFINED", or "INTEGRATOR_DEFINED".
     *
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $obj = clone $this;
        $obj['category'] = $category;

        return $obj;
    }

    /**
     * The ID of the source object type (e.g., 0-1 for contacts).
     */
    public function withFromObjectTypeID(string $fromObjectTypeID): self
    {
        $obj = clone $this;
        $obj['fromObjectTypeId'] = $fromObjectTypeID;

        return $obj;
    }

    /**
     * Whether all potential linked objects are included in the association.
     */
    public function withHasAllAssociatedObjects(
        bool $hasAllAssociatedObjects
    ): self {
        $obj = clone $this;
        $obj['hasAllAssociatedObjects'] = $hasAllAssociatedObjects;

        return $obj;
    }

    /**
     * Whether deletions in the association should cause cascading deletes to linked objects.
     */
    public function withHasCascadingDeletes(bool $hasCascadingDeletes): self
    {
        $obj = clone $this;
        $obj['hasCascadingDeletes'] = $hasCascadingDeletes;

        return $obj;
    }

    /**
     * Whether a user has set a limit for the number of source objects.
     */
    public function withHasUserEnforcedMaxFromObjectIDs(
        bool $hasUserEnforcedMaxFromObjectIDs
    ): self {
        $obj = clone $this;
        $obj['hasUserEnforcedMaxFromObjectIds'] = $hasUserEnforcedMaxFromObjectIDs;

        return $obj;
    }

    /**
     * Whether a user has set a limit for the number of destination objects.
     */
    public function withHasUserEnforcedMaxToObjectIDs(
        bool $hasUserEnforcedMaxToObjectIDs
    ): self {
        $obj = clone $this;
        $obj['hasUserEnforcedMaxToObjectIds'] = $hasUserEnforcedMaxToObjectIDs;

        return $obj;
    }

    /**
     * Whether the association is hidden or not.
     */
    public function withHidden(bool $hidden): self
    {
        $obj = clone $this;
        $obj['hidden'] = $hidden;

        return $obj;
    }

    /**
     * Whether the reverse association can also support custom labels.
     */
    public function withInverseAllowsCustomLabels(
        bool $inverseAllowsCustomLabels
    ): self {
        $obj = clone $this;
        $obj['inverseAllowsCustomLabels'] = $inverseAllowsCustomLabels;

        return $obj;
    }

    /**
     * The cardinality from the destination object's perspective, either "ONE_TO_ONE" or "ONE_TO_MANY".
     *
     * @param InverseCardinality|value-of<InverseCardinality> $inverseCardinality
     */
    public function withInverseCardinality(
        InverseCardinality|string $inverseCardinality
    ): self {
        $obj = clone $this;
        $obj['inverseCardinality'] = $inverseCardinality;

        return $obj;
    }

    /**
     * Whether all potential reverse linked objects are included in the association.
     */
    public function withInverseHasAllAssociatedObjects(
        bool $inverseHasAllAssociatedObjects
    ): self {
        $obj = clone $this;
        $obj['inverseHasAllAssociatedObjects'] = $inverseHasAllAssociatedObjects;

        return $obj;
    }

    /**
     * The unique ID for the inverse side of the association.
     */
    public function withInverseID(int $inverseID): self
    {
        $obj = clone $this;
        $obj['inverseId'] = $inverseID;

        return $obj;
    }

    /**
     * The name used to describe the inverse relationship in this association.
     */
    public function withInverseName(string $inverseName): self
    {
        $obj = clone $this;
        $obj['inverseName'] = $inverseName;

        return $obj;
    }

    /**
     * Whether the inverse association is considered primary.
     */
    public function withIsInversePrimary(bool $isInversePrimary): self
    {
        $obj = clone $this;
        $obj['isInversePrimary'] = $isInversePrimary;

        return $obj;
    }

    /**
     * Whether the association is the primary link between the entities involved.
     */
    public function withIsPrimary(bool $isPrimary): self
    {
        $obj = clone $this;
        $obj['isPrimary'] = $isPrimary;

        return $obj;
    }

    /**
     * The maximum number of source object IDs allowed in the association.
     */
    public function withMaxFromObjectIDs(int $maxFromObjectIDs): self
    {
        $obj = clone $this;
        $obj['maxFromObjectIds'] = $maxFromObjectIDs;

        return $obj;
    }

    /**
     * The maximum number of destination object IDs allowed in the association.
     */
    public function withMaxToObjectIDs(int $maxToObjectIDs): self
    {
        $obj = clone $this;
        $obj['maxToObjectIds'] = $maxToObjectIDs;

        return $obj;
    }

    /**
     * For labeled association types, the internal name of the association.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * A unique across-portal ID applied to the association.
     */
    public function withPortalUniqueIdentifier(
        string $portalUniqueIdentifier
    ): self {
        $obj = clone $this;
        $obj['portalUniqueIdentifier'] = $portalUniqueIdentifier;

        return $obj;
    }

    /**
     * The ID of the destination object type (e.g., 0-3 for deals).
     */
    public function withToObjectTypeID(string $toObjectTypeID): self
    {
        $obj = clone $this;
        $obj['toObjectTypeId'] = $toObjectTypeID;

        return $obj;
    }

    /**
     * The name of the source object type (e.g,. "DEAL" or "QUOTE").
     *
     * @param FromObjectType|value-of<FromObjectType> $fromObjectType
     */
    public function withFromObjectType(
        FromObjectType|string $fromObjectType
    ): self {
        $obj = clone $this;
        $obj['fromObjectType'] = $fromObjectType;

        return $obj;
    }

    /**
     * The label used to describe the reverse relationship in an association.
     */
    public function withInverseLabel(string $inverseLabel): self
    {
        $obj = clone $this;
        $obj['inverseLabel'] = $inverseLabel;

        return $obj;
    }

    /**
     * The label given to an association.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    /**
     * The name of the destination object type (e.g,. "DEAL" or "QUOTE").
     *
     * @param ToObjectType|value-of<ToObjectType> $toObjectType
     */
    public function withToObjectType(ToObjectType|string $toObjectType): self
    {
        $obj = clone $this;
        $obj['toObjectType'] = $toObjectType;

        return $obj;
    }
}
