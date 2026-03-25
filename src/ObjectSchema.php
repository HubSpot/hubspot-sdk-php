<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Cms\MediaBridge\Property1;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\AssociationDefinition;

/**
 * @phpstan-import-type AssociationDefinitionShape from \HubspotSDK\Events\AssociationDefinition
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type Property1Shape from \HubspotSDK\Cms\MediaBridge\Property1
 *
 * @phpstan-type ObjectSchemaShape = array{
 *   id: string,
 *   allowsSensitiveProperties: bool,
 *   archived: bool,
 *   associations: list<\HubspotSDK\Events\AssociationDefinition|AssociationDefinitionShape>,
 *   fullyQualifiedName: string,
 *   labels: ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
 *   name: string,
 *   objectTypeID: string,
 *   properties: list<Property1|Property1Shape>,
 *   requiredProperties: list<string>,
 *   searchableProperties: list<string>,
 *   secondaryDisplayProperties: list<string>,
 *   createdAt?: \DateTimeInterface|null,
 *   createdByUserID?: int|null,
 *   description?: string|null,
 *   primaryDisplayProperty?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   updatedByUserID?: int|null,
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

    #[Required('objectTypeId')]
    public string $objectTypeID;

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

    #[Optional('createdByUserId')]
    public ?int $createdByUserID;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $primaryDisplayProperty;

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
     *   allowsSensitiveProperties: ...,
     *   archived: ...,
     *   associations: ...,
     *   fullyQualifiedName: ...,
     *   labels: ...,
     *   name: ...,
     *   objectTypeID: ...,
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
     * @param list<AssociationDefinition|AssociationDefinitionShape> $associations
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape $labels
     * @param list<Property1|Property1Shape> $properties
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
        string $objectTypeID,
        array $properties,
        array $requiredProperties,
        array $searchableProperties,
        array $secondaryDisplayProperties,
        ?\DateTimeInterface $createdAt = null,
        ?int $createdByUserID = null,
        ?string $description = null,
        ?string $primaryDisplayProperty = null,
        ?\DateTimeInterface $updatedAt = null,
        ?int $updatedByUserID = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;
        $self['archived'] = $archived;
        $self['associations'] = $associations;
        $self['fullyQualifiedName'] = $fullyQualifiedName;
        $self['labels'] = $labels;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['properties'] = $properties;
        $self['requiredProperties'] = $requiredProperties;
        $self['searchableProperties'] = $searchableProperties;
        $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $createdByUserID && $self['createdByUserID'] = $createdByUserID;
        null !== $description && $self['description'] = $description;
        null !== $primaryDisplayProperty && $self['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $updatedByUserID && $self['updatedByUserID'] = $updatedByUserID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $self = clone $this;
        $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;

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
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape $labels
     */
    public function withLabels(ObjectTypeDefinitionLabels|array $labels): self
    {
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
     * @param list<Property1|Property1Shape> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $self = clone $this;
        $self['requiredProperties'] = $requiredProperties;

        return $self;
    }

    /**
     * @param list<string> $searchableProperties
     */
    public function withSearchableProperties(array $searchableProperties): self
    {
        $self = clone $this;
        $self['searchableProperties'] = $searchableProperties;

        return $self;
    }

    /**
     * @param list<string> $secondaryDisplayProperties
     */
    public function withSecondaryDisplayProperties(
        array $secondaryDisplayProperties
    ): self {
        $self = clone $this;
        $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $self;
    }

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

    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $self = clone $this;
        $self['primaryDisplayProperty'] = $primaryDisplayProperty;

        return $self;
    }

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
