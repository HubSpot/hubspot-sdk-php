<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * @phpstan-type ObjectTypeDefinitionShape = array{
 *   id: string,
 *   allowsSensitiveProperties: bool,
 *   archived: bool,
 *   fullyQualifiedName: string,
 *   labels: ObjectTypeDefinitionLabels,
 *   name: string,
 *   objectTypeID: string,
 *   requiredProperties: list<string>,
 *   searchableProperties: list<string>,
 *   secondaryDisplayProperties: list<string>,
 *   createdAt?: \DateTimeInterface,
 *   description?: string,
 *   portalID?: int,
 *   primaryDisplayProperty?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class ObjectTypeDefinition implements BaseModel
{
    /** @use SdkModel<ObjectTypeDefinitionShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public bool $allowsSensitiveProperties;

    #[Api]
    public bool $archived;

    #[Api]
    public string $fullyQualifiedName;

    #[Api]
    public ObjectTypeDefinitionLabels $labels;

    #[Api]
    public string $name;

    #[Api('objectTypeId')]
    public string $objectTypeID;

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

    #[Api(optional: true)]
    public ?string $description;

    #[Api('portalId', optional: true)]
    public ?int $portalID;

    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new ObjectTypeDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectTypeDefinition::with(
     *   id: ...,
     *   allowsSensitiveProperties: ...,
     *   archived: ...,
     *   fullyQualifiedName: ...,
     *   labels: ...,
     *   name: ...,
     *   objectTypeID: ...,
     *   requiredProperties: ...,
     *   searchableProperties: ...,
     *   secondaryDisplayProperties: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectTypeDefinition)
     *   ->withID(...)
     *   ->withAllowsSensitiveProperties(...)
     *   ->withArchived(...)
     *   ->withFullyQualifiedName(...)
     *   ->withLabels(...)
     *   ->withName(...)
     *   ->withObjectTypeID(...)
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
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        string $id,
        bool $allowsSensitiveProperties,
        bool $archived,
        string $fullyQualifiedName,
        ObjectTypeDefinitionLabels $labels,
        string $name,
        string $objectTypeID,
        array $requiredProperties,
        array $searchableProperties,
        array $secondaryDisplayProperties,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?int $portalID = null,
        ?string $primaryDisplayProperty = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->allowsSensitiveProperties = $allowsSensitiveProperties;
        $obj->archived = $archived;
        $obj->fullyQualifiedName = $fullyQualifiedName;
        $obj->labels = $labels;
        $obj->name = $name;
        $obj->objectTypeID = $objectTypeID;
        $obj->requiredProperties = $requiredProperties;
        $obj->searchableProperties = $searchableProperties;
        $obj->secondaryDisplayProperties = $secondaryDisplayProperties;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $description && $obj->description = $description;
        null !== $portalID && $obj->portalID = $portalID;
        null !== $primaryDisplayProperty && $obj->primaryDisplayProperty = $primaryDisplayProperty;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj->portalID = $portalID;

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
}
