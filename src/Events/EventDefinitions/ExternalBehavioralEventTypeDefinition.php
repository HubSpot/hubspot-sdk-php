<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Events\EventDefinitions\ExternalBehavioralEventTypeDefinition\TrackingType;
use HubspotSDK\Property;

/**
 * @phpstan-type ExternalBehavioralEventTypeDefinitionShape = array{
 *   id: string,
 *   archived: bool,
 *   associations: list<AssociationDefinition>,
 *   fullyQualifiedName: string,
 *   labels: BehavioralEventTypeDefinitionLabels,
 *   name: string,
 *   objectTypeId: string,
 *   properties: list<Property>,
 *   comboEventRules?: ComboEventRuleBranch|null,
 *   createdAt?: \DateTimeInterface|null,
 *   createdUserId?: int|null,
 *   description?: string|null,
 *   primaryObject?: string|null,
 *   primaryObjectId?: string|null,
 *   trackingType?: value-of<TrackingType>|null,
 * }
 */
final class ExternalBehavioralEventTypeDefinition implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ExternalBehavioralEventTypeDefinitionShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public bool $archived;

    /** @var list<AssociationDefinition> $associations */
    #[Api(list: AssociationDefinition::class)]
    public array $associations;

    #[Api]
    public string $fullyQualifiedName;

    #[Api]
    public BehavioralEventTypeDefinitionLabels $labels;

    #[Api]
    public string $name;

    #[Api]
    public string $objectTypeId;

    /** @var list<Property> $properties */
    #[Api(list: Property::class)]
    public array $properties;

    #[Api(optional: true)]
    public ?ComboEventRuleBranch $comboEventRules;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?int $createdUserId;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $primaryObject;

    #[Api(optional: true)]
    public ?string $primaryObjectId;

    /** @var value-of<TrackingType>|null $trackingType */
    #[Api(enum: TrackingType::class, optional: true)]
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
     *   objectTypeId: ...,
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
     * @param list<AssociationDefinition> $associations
     * @param list<Property> $properties
     * @param TrackingType|value-of<TrackingType> $trackingType
     */
    public static function with(
        string $id,
        bool $archived,
        array $associations,
        string $fullyQualifiedName,
        BehavioralEventTypeDefinitionLabels $labels,
        string $name,
        string $objectTypeId,
        array $properties,
        ?ComboEventRuleBranch $comboEventRules = null,
        ?\DateTimeInterface $createdAt = null,
        ?int $createdUserId = null,
        ?string $description = null,
        ?string $primaryObject = null,
        ?string $primaryObjectId = null,
        TrackingType|string|null $trackingType = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->archived = $archived;
        $obj->associations = $associations;
        $obj->fullyQualifiedName = $fullyQualifiedName;
        $obj->labels = $labels;
        $obj->name = $name;
        $obj->objectTypeId = $objectTypeId;
        $obj->properties = $properties;

        null !== $comboEventRules && $obj->comboEventRules = $comboEventRules;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdUserId && $obj->createdUserId = $createdUserId;
        null !== $description && $obj->description = $description;
        null !== $primaryObject && $obj->primaryObject = $primaryObject;
        null !== $primaryObjectId && $obj->primaryObjectId = $primaryObjectId;
        null !== $trackingType && $obj['trackingType'] = $trackingType;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * @param list<AssociationDefinition> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }

    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $obj = clone $this;
        $obj->fullyQualifiedName = $fullyQualifiedName;

        return $obj;
    }

    public function withLabels(
        BehavioralEventTypeDefinitionLabels $labels
    ): self {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeId = $objectTypeID;

        return $obj;
    }

    /**
     * @param list<Property> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    public function withComboEventRules(
        ComboEventRuleBranch $comboEventRules
    ): self {
        $obj = clone $this;
        $obj->comboEventRules = $comboEventRules;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedUserID(int $createdUserID): self
    {
        $obj = clone $this;
        $obj->createdUserId = $createdUserID;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withPrimaryObject(string $primaryObject): self
    {
        $obj = clone $this;
        $obj->primaryObject = $primaryObject;

        return $obj;
    }

    public function withPrimaryObjectID(string $primaryObjectID): self
    {
        $obj = clone $this;
        $obj->primaryObjectId = $primaryObjectID;

        return $obj;
    }

    /**
     * @param TrackingType|value-of<TrackingType> $trackingType
     */
    public function withTrackingType(TrackingType|string $trackingType): self
    {
        $obj = clone $this;
        $obj['trackingType'] = $trackingType;

        return $obj;
    }
}
