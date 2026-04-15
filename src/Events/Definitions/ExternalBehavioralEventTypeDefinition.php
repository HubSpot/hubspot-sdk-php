<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\ExternalBehavioralEventTypeDefinition\TrackingType;
use HubSpotSDK\Property;

/**
 * @phpstan-import-type AssociationDefinitionShape from \HubSpotSDK\Events\Definitions\AssociationDefinition
 * @phpstan-import-type BehavioralEventTypeDefinitionLabelsShape from \HubSpotSDK\Events\Definitions\BehavioralEventTypeDefinitionLabels
 * @phpstan-import-type PropertyShape from \HubSpotSDK\Property
 * @phpstan-import-type ComboEventRuleBranchShape from \HubSpotSDK\Events\Definitions\ComboEventRuleBranch
 * @phpstan-import-type ExternalObjectResolutionMappingResponseShape from \HubSpotSDK\Events\Definitions\ExternalObjectResolutionMappingResponse
 *
 * @phpstan-type ExternalBehavioralEventTypeDefinitionShape = array{
 *   id: string,
 *   archived: bool,
 *   associations: list<AssociationDefinition|AssociationDefinitionShape>,
 *   fullyQualifiedName: string,
 *   labels: BehavioralEventTypeDefinitionLabels|BehavioralEventTypeDefinitionLabelsShape,
 *   name: string,
 *   objectTypeID: string,
 *   properties: list<Property|PropertyShape>,
 *   comboEventRules?: null|ComboEventRuleBranch|ComboEventRuleBranchShape,
 *   createdAt?: \DateTimeInterface|null,
 *   createdUserID?: int|null,
 *   customMatchingID?: null|ExternalObjectResolutionMappingResponse|ExternalObjectResolutionMappingResponseShape,
 *   description?: string|null,
 *   primaryObject?: string|null,
 *   primaryObjectID?: string|null,
 *   trackingType?: null|TrackingType|value-of<TrackingType>,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedUserID?: int|null,
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

    #[Optional('customMatchingId')]
    public ?ExternalObjectResolutionMappingResponse $customMatchingID;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $primaryObject;

    #[Optional('primaryObjectId')]
    public ?string $primaryObjectID;

    /** @var value-of<TrackingType>|null $trackingType */
    #[Optional(enum: TrackingType::class)]
    public ?string $trackingType;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('updatedUserId')]
    public ?int $updatedUserID;

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
     * @param list<AssociationDefinition|AssociationDefinitionShape> $associations
     * @param BehavioralEventTypeDefinitionLabels|BehavioralEventTypeDefinitionLabelsShape $labels
     * @param list<Property|PropertyShape> $properties
     * @param ComboEventRuleBranch|ComboEventRuleBranchShape|null $comboEventRules
     * @param ExternalObjectResolutionMappingResponse|ExternalObjectResolutionMappingResponseShape|null $customMatchingID
     * @param TrackingType|value-of<TrackingType>|null $trackingType
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
        ExternalObjectResolutionMappingResponse|array|null $customMatchingID = null,
        ?string $description = null,
        ?string $primaryObject = null,
        ?string $primaryObjectID = null,
        TrackingType|string|null $trackingType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $updatedUserID = null,
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
        null !== $customMatchingID && $self['customMatchingID'] = $customMatchingID;
        null !== $description && $self['description'] = $description;
        null !== $primaryObject && $self['primaryObject'] = $primaryObject;
        null !== $primaryObjectID && $self['primaryObjectID'] = $primaryObjectID;
        null !== $trackingType && $self['trackingType'] = $trackingType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedUserID && $self['updatedUserID'] = $updatedUserID;

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
     * @param list<AssociationDefinition|AssociationDefinitionShape> $associations
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
     * @param BehavioralEventTypeDefinitionLabels|BehavioralEventTypeDefinitionLabelsShape $labels
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
     * @param list<Property|PropertyShape> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param ComboEventRuleBranch|ComboEventRuleBranchShape $comboEventRules
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

    /**
     * @param ExternalObjectResolutionMappingResponse|ExternalObjectResolutionMappingResponseShape $customMatchingID
     */
    public function withCustomMatchingID(
        ExternalObjectResolutionMappingResponse|array $customMatchingID
    ): self {
        $self = clone $this;
        $self['customMatchingID'] = $customMatchingID;

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

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUpdatedUserID(int $updatedUserID): self
    {
        $self = clone $this;
        $self['updatedUserID'] = $updatedUserID;

        return $self;
    }
}
