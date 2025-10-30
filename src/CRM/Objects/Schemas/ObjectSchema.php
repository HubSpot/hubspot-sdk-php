<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;
use HubspotSDK\Property;

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
 *   archived?: bool,
 *   createdAt?: \DateTimeInterface,
 *   createdByUserID?: int,
 *   description?: string,
 *   fullyQualifiedName?: string,
 *   objectTypeID?: string,
 *   primaryDisplayProperty?: string,
 *   searchableProperties?: list<string>,
 *   secondaryDisplayProperties?: list<string>,
 *   updatedAt?: \DateTimeInterface,
 *   updatedByUserID?: int,
 * }
 */
final class ObjectSchema implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ObjectSchemaShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A unique ID for this schema's object type. Will be defined as {meta-type}-{unique ID}.
     */
    #[Api]
    public string $id;

    /**
     * Associations defined for a given object type.
     *
     * @var list<AssociationDefinition> $associations
     */
    #[Api(list: AssociationDefinition::class)]
    public array $associations;

    #[Api]
    public ObjectTypeDefinitionLabels $labels;

    /**
     * A unique name for the schema's object type.
     */
    #[Api]
    public string $name;

    /**
     * Properties defined for this object type.
     *
     * @var list<Property> $properties
     */
    #[Api(list: Property::class)]
    public array $properties;

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @var list<string> $requiredProperties
     */
    #[Api(list: 'string')]
    public array $requiredProperties;

    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * When the object schema was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('createdByUserId', optional: true)]
    public ?int $createdByUserID;

    #[Api(optional: true)]
    public ?string $description;

    /**
     * An assigned unique ID for the object, including portal ID and object name.
     */
    #[Api(optional: true)]
    public ?string $fullyQualifiedName;

    #[Api('objectTypeId', optional: true)]
    public ?string $objectTypeID;

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

    /**
     * Names of properties that will be indexed for this object type in by HubSpot's product search.
     *
     * @var list<string>|null $searchableProperties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $searchableProperties;

    /**
     * The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @var list<string>|null $secondaryDisplayProperties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $secondaryDisplayProperties;

    /**
     * When the object schema was last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    #[Api('updatedByUserId', optional: true)]
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
     * @param list<AssociationDefinition> $associations
     * @param list<Property> $properties
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        string $id,
        array $associations,
        ObjectTypeDefinitionLabels $labels,
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
        $obj = new self;

        $obj->id = $id;
        $obj->associations = $associations;
        $obj->labels = $labels;
        $obj->name = $name;
        $obj->properties = $properties;
        $obj->requiredProperties = $requiredProperties;

        null !== $archived && $obj->archived = $archived;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdByUserID && $obj->createdByUserID = $createdByUserID;
        null !== $description && $obj->description = $description;
        null !== $fullyQualifiedName && $obj->fullyQualifiedName = $fullyQualifiedName;
        null !== $objectTypeID && $obj->objectTypeID = $objectTypeID;
        null !== $primaryDisplayProperty && $obj->primaryDisplayProperty = $primaryDisplayProperty;
        null !== $searchableProperties && $obj->searchableProperties = $searchableProperties;
        null !== $secondaryDisplayProperties && $obj->secondaryDisplayProperties = $secondaryDisplayProperties;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedByUserID && $obj->updatedByUserID = $updatedByUserID;

        return $obj;
    }

    /**
     * A unique ID for this schema's object type. Will be defined as {meta-type}-{unique ID}.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Associations defined for a given object type.
     *
     * @param list<AssociationDefinition> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }

    public function withLabels(ObjectTypeDefinitionLabels $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }

    /**
     * A unique name for the schema's object type.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Properties defined for this object type.
     *
     * @param list<Property> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $obj = clone $this;
        $obj->requiredProperties = $requiredProperties;

        return $obj;
    }

    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj->archived = $archived;

        return $obj;
    }

    /**
     * When the object schema was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCreatedByUserID(int $createdByUserID): self
    {
        $obj = clone $this;
        $obj->createdByUserID = $createdByUserID;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * An assigned unique ID for the object, including portal ID and object name.
     */
    public function withFullyQualifiedName(string $fullyQualifiedName): self
    {
        $obj = clone $this;
        $obj->fullyQualifiedName = $fullyQualifiedName;

        return $obj;
    }

    public function withObjectTypeID(string $objectTypeID): self
    {
        $obj = clone $this;
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $obj = clone $this;
        $obj->primaryDisplayProperty = $primaryDisplayProperty;

        return $obj;
    }

    /**
     * Names of properties that will be indexed for this object type in by HubSpot's product search.
     *
     * @param list<string> $searchableProperties
     */
    public function withSearchableProperties(array $searchableProperties): self
    {
        $obj = clone $this;
        $obj->searchableProperties = $searchableProperties;

        return $obj;
    }

    /**
     * The names of secondary properties for this object. These will be displayed as secondary on the HubSpot record page for this object type.
     *
     * @param list<string> $secondaryDisplayProperties
     */
    public function withSecondaryDisplayProperties(
        array $secondaryDisplayProperties
    ): self {
        $obj = clone $this;
        $obj->secondaryDisplayProperties = $secondaryDisplayProperties;

        return $obj;
    }

    /**
     * When the object schema was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUpdatedByUserID(int $updatedByUserID): self
    {
        $obj = clone $this;
        $obj->updatedByUserID = $updatedByUserID;

        return $obj;
    }
}
