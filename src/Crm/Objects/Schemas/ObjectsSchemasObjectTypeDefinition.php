<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * Defines an object type.
 *
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 *
 * @phpstan-type ObjectsSchemasObjectTypeDefinitionShape = array{
 *   id: string,
 *   labels: ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
 *   name: string,
 *   requiredProperties: list<string>,
 *   archived?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   fullyQualifiedName?: string|null,
 *   objectTypeID?: string|null,
 *   portalID?: int|null,
 *   primaryDisplayProperty?: string|null,
 *   searchableProperties?: list<string>|null,
 *   secondaryDisplayProperties?: list<string>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class ObjectsSchemasObjectTypeDefinition implements BaseModel
{
    /** @use SdkModel<ObjectsSchemasObjectTypeDefinitionShape> */
    use SdkModel;

    /**
     * A unique ID for this object type. Will be defined as {meta-type}-{unique ID}.
     */
    #[Required]
    public string $id;

    #[Required]
    public ObjectTypeDefinitionLabels $labels;

    /**
     * A unique name for this object. For internal use only.
     */
    #[Required]
    public string $name;

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
     * When the object type was created.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $fullyQualifiedName;

    #[Optional('objectTypeId')]
    public ?string $objectTypeID;

    /**
     * The ID of the account that this object type is specific to.
     */
    #[Optional('portalId')]
    public ?int $portalID;

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
     * When the object type was last updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new ObjectsSchemasObjectTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectsSchemasObjectTypeDefinition::with(
     *   id: ..., labels: ..., name: ..., requiredProperties: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectsSchemasObjectTypeDefinition)
     *   ->withID(...)
     *   ->withLabels(...)
     *   ->withName(...)
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
     * @param ObjectTypeDefinitionLabelsShape $labels
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        string $id,
        ObjectTypeDefinitionLabels|array $labels,
        string $name,
        array $requiredProperties,
        ?bool $archived = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?string $fullyQualifiedName = null,
        ?string $objectTypeID = null,
        ?int $portalID = null,
        ?string $primaryDisplayProperty = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['labels'] = $labels;
        $self['name'] = $name;
        $self['requiredProperties'] = $requiredProperties;

        null !== $archived && $self['archived'] = $archived;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $fullyQualifiedName && $self['fullyQualifiedName'] = $fullyQualifiedName;
        null !== $objectTypeID && $self['objectTypeID'] = $objectTypeID;
        null !== $portalID && $self['portalID'] = $portalID;
        null !== $primaryDisplayProperty && $self['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $searchableProperties && $self['searchableProperties'] = $searchableProperties;
        null !== $secondaryDisplayProperties && $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * A unique ID for this object type. Will be defined as {meta-type}-{unique ID}.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param ObjectTypeDefinitionLabelsShape $labels
     */
    public function withLabels(ObjectTypeDefinitionLabels|array $labels): self
    {
        $self = clone $this;
        $self['labels'] = $labels;

        return $self;
    }

    /**
     * A unique name for this object. For internal use only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

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
     * When the object type was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

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
     * The ID of the account that this object type is specific to.
     */
    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

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
     * When the object type was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
