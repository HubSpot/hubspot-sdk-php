<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 *
 * @phpstan-type ObjectTypeDefinitionShape = array{
 *   id: string,
 *   allowsSensitiveProperties: bool,
 *   archived: bool,
 *   fullyQualifiedName: string,
 *   labels: ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
 *   name: string,
 *   objectTypeID: string,
 *   requiredProperties: list<string>,
 *   searchableProperties: list<string>,
 *   secondaryDisplayProperties: list<string>,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   portalID?: int|null,
 *   primaryDisplayProperty?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class ObjectTypeDefinition implements BaseModel
{
    /** @use SdkModel<ObjectTypeDefinitionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public bool $allowsSensitiveProperties;

    #[Required]
    public bool $archived;

    #[Required]
    public string $fullyQualifiedName;

    #[Required]
    public ObjectTypeDefinitionLabels $labels;

    #[Required]
    public string $name;

    #[Required('objectTypeId')]
    public string $objectTypeID;

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

    #[Optional]
    public ?string $description;

    #[Optional('portalId')]
    public ?int $portalID;

    #[Optional]
    public ?string $primaryDisplayProperty;

    #[Optional]
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
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape $labels
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        string $id,
        bool $allowsSensitiveProperties,
        bool $archived,
        string $fullyQualifiedName,
        ObjectTypeDefinitionLabels|array $labels,
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
        $self = new self;

        $self['id'] = $id;
        $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;
        $self['archived'] = $archived;
        $self['fullyQualifiedName'] = $fullyQualifiedName;
        $self['labels'] = $labels;
        $self['name'] = $name;
        $self['objectTypeID'] = $objectTypeID;
        $self['requiredProperties'] = $requiredProperties;
        $self['searchableProperties'] = $searchableProperties;
        $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $portalID && $self['portalID'] = $portalID;
        null !== $primaryDisplayProperty && $self['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

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

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

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
}
