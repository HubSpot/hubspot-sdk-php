<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\ObjectSchemas;

use HubSpotSDK\AssociationDefinition;
use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ObjectTypeDefinitionLabels;
use HubSpotSDK\Property;

/**
 * @phpstan-import-type AssociationDefinitionShape from \HubSpotSDK\AssociationDefinition
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubSpotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type PropertyShape from \HubSpotSDK\Property
 *
 * @phpstan-type ObjectSchemaShape = array{
 *   id: string,
 *   allowsSensitiveProperties: bool,
 *   archived: bool,
 *   associations: list<AssociationDefinition|AssociationDefinitionShape>,
 *   fullyQualifiedName: string,
 *   labels: ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
 *   name: string,
 *   objectTypeID: string,
 *   properties: list<Property|PropertyShape>,
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

    /**
     * A unique ID for this schema's object type. Will be defined as {meta-type}-{unique ID}.
     */
    #[Required]
    public string $id;

    #[Required]
    public bool $allowsSensitiveProperties;

    #[Required]
    public bool $archived;

    /**
     * Associations defined for a given object type.
     *
     * @var list<AssociationDefinition> $associations
     */
    #[Required(list: AssociationDefinition::class)]
    public array $associations;

    /**
     * An assigned unique ID for the object, including portal ID and object name.
     */
    #[Required]
    public string $fullyQualifiedName;

    #[Required]
    public ObjectTypeDefinitionLabels $labels;

    /**
     * A unique name for the schema's object type.
     */
    #[Required]
    public string $name;

    #[Required('objectTypeId')]
    public string $objectTypeID;

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

    /**
     * Names of properties that will be indexed for this object type in by HubSpot's product search.
     *
     * @var list<string> $searchableProperties
     */
    #[Required(list: 'string')]
    public array $searchableProperties;

    /**
     * The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @var list<string> $secondaryDisplayProperties
     */
    #[Required(list: 'string')]
    public array $secondaryDisplayProperties;

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
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    #[Optional]
    public ?string $primaryDisplayProperty;

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
     * @param list<Property|PropertyShape> $properties
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

    /**
     * A unique ID for this schema's object type. Will be defined as {meta-type}-{unique ID}.
     */
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
     * Associations defined for a given object type.
     *
     * @param list<AssociationDefinition|AssociationDefinitionShape> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

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

    /**
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape $labels
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

    public function withObjectTypeID(string $objectTypeID): self
    {
        $self = clone $this;
        $self['objectTypeID'] = $objectTypeID;

        return $self;
    }

    /**
     * Properties defined for this object type.
     *
     * @param list<Property|PropertyShape> $properties
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
