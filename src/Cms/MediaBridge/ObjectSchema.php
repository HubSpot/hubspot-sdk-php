<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * @phpstan-type ObjectSchemaShape = array{
 *   id: string,
 *   allowsSensitiveProperties: bool,
 *   archived: bool,
 *   associations: list<AssociationDefinition>,
 *   fullyQualifiedName: string,
 *   labels: ObjectTypeDefinitionLabels,
 *   name: string,
 *   objectTypeID: string,
 *   properties: list<Property1>,
 *   requiredProperties: list<string>,
 *   searchableProperties: list<string>,
 *   secondaryDisplayProperties: list<string>,
 *   createdAt?: \DateTimeInterface,
 *   createdByUserID?: int,
 *   description?: string,
 *   primaryDisplayProperty?: string,
 *   updatedAt?: \DateTimeInterface,
 *   updatedByUserID?: int,
 * }
 */
final class ObjectSchema implements BaseModel
{
    /** @use SdkModel<ObjectSchemaShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $allowsSensitiveProperties;

    #[Api]
    public bool $archived;

    /** @var list<AssociationDefinition> $associations */
    #[Api(list: AssociationDefinition::class)]
    public array $associations;

    #[Api]
    public string $fullyQualifiedName;

    #[Api]
    public ObjectTypeDefinitionLabels $labels;

    #[Api]
    public string $name;

    #[Api('objectTypeId')]
    public string $objectTypeID;

    /** @var list<Property1> $properties */
    #[Api(list: Property1::class)]
    public array $properties;

    /** @var list<string> $requiredProperties */
    #[Api(list: 'string')]
    public array $requiredProperties;

    /** @var list<string> $searchableProperties */
    #[Api(list: 'string')]
    public array $searchableProperties;

    /** @var list<string> $secondaryDisplayProperties */
    #[Api(list: 'string')]
    public array $secondaryDisplayProperties;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api('createdByUserId', optional: true)]
    public ?int $createdByUserID;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

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
     * @param list<AssociationDefinition> $associations
     * @param list<Property1> $properties
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
        ObjectTypeDefinitionLabels $labels,
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
        $obj = new self;

        $obj->id = $id;
        $obj->allowsSensitiveProperties = $allowsSensitiveProperties;
        $obj->archived = $archived;
        $obj->associations = $associations;
        $obj->fullyQualifiedName = $fullyQualifiedName;
        $obj->labels = $labels;
        $obj->name = $name;
        $obj->objectTypeID = $objectTypeID;
        $obj->properties = $properties;
        $obj->requiredProperties = $requiredProperties;
        $obj->searchableProperties = $searchableProperties;
        $obj->secondaryDisplayProperties = $secondaryDisplayProperties;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $createdByUserID && $obj->createdByUserID = $createdByUserID;
        null !== $description && $obj->description = $description;
        null !== $primaryDisplayProperty && $obj->primaryDisplayProperty = $primaryDisplayProperty;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $updatedByUserID && $obj->updatedByUserID = $updatedByUserID;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $obj = clone $this;
        $obj->allowsSensitiveProperties = $allowsSensitiveProperties;

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

    public function withLabels(ObjectTypeDefinitionLabels $labels): self
    {
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
        $obj->objectTypeID = $objectTypeID;

        return $obj;
    }

    /**
     * @param list<Property1> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param list<string> $requiredProperties
     */
    public function withRequiredProperties(array $requiredProperties): self
    {
        $obj = clone $this;
        $obj->requiredProperties = $requiredProperties;

        return $obj;
    }

    /**
     * @param list<string> $searchableProperties
     */
    public function withSearchableProperties(array $searchableProperties): self
    {
        $obj = clone $this;
        $obj->searchableProperties = $searchableProperties;

        return $obj;
    }

    /**
     * @param list<string> $secondaryDisplayProperties
     */
    public function withSecondaryDisplayProperties(
        array $secondaryDisplayProperties
    ): self {
        $obj = clone $this;
        $obj->secondaryDisplayProperties = $secondaryDisplayProperties;

        return $obj;
    }

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

    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $obj = clone $this;
        $obj->primaryDisplayProperty = $primaryDisplayProperty;

        return $obj;
    }

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
