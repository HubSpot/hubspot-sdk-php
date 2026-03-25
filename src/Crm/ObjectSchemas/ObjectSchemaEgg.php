<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\ObjectSchemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 * @phpstan-import-type ObjectTypePropertyCreateShape from \HubspotSDK\Crm\ObjectSchemas\ObjectTypePropertyCreate
 *
 * @phpstan-type ObjectSchemaEggShape = array{
 *   allowsSensitiveProperties: bool,
 *   associatedObjects: list<string>,
 *   labels: ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
 *   name: string,
 *   properties: list<ObjectTypePropertyCreate|ObjectTypePropertyCreateShape>,
 *   requiredProperties: list<string>,
 *   searchableProperties: list<string>,
 *   secondaryDisplayProperties: list<string>,
 *   description?: string|null,
 *   primaryDisplayProperty?: string|null,
 * }
 */
final class ObjectSchemaEgg implements BaseModel
{
    /** @use SdkModel<ObjectSchemaEggShape> */
    use SdkModel;

    #[Required]
    public bool $allowsSensitiveProperties;

    /**
     * Associations defined for this object type.
     *
     * @var list<string> $associatedObjects
     */
    #[Required(list: 'string')]
    public array $associatedObjects;

    #[Required]
    public ObjectTypeDefinitionLabels $labels;

    /**
     * A unique name for this object. For internal use only.
     */
    #[Required]
    public string $name;

    /**
     * Properties defined for this object type.
     *
     * @var list<ObjectTypePropertyCreate> $properties
     */
    #[Required(list: ObjectTypePropertyCreate::class)]
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

    #[Optional]
    public ?string $description;

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    #[Optional]
    public ?string $primaryDisplayProperty;

    /**
     * `new ObjectSchemaEgg()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchemaEgg::with(
     *   allowsSensitiveProperties: ...,
     *   associatedObjects: ...,
     *   labels: ...,
     *   name: ...,
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
     * (new ObjectSchemaEgg)
     *   ->withAllowsSensitiveProperties(...)
     *   ->withAssociatedObjects(...)
     *   ->withLabels(...)
     *   ->withName(...)
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
     * @param list<string> $associatedObjects
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape $labels
     * @param list<ObjectTypePropertyCreate|ObjectTypePropertyCreateShape> $properties
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        bool $allowsSensitiveProperties,
        array $associatedObjects,
        ObjectTypeDefinitionLabels|array $labels,
        string $name,
        array $properties,
        array $requiredProperties,
        array $searchableProperties,
        array $secondaryDisplayProperties,
        ?string $description = null,
        ?string $primaryDisplayProperty = null,
    ): self {
        $self = new self;

        $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;
        $self['associatedObjects'] = $associatedObjects;
        $self['labels'] = $labels;
        $self['name'] = $name;
        $self['properties'] = $properties;
        $self['requiredProperties'] = $requiredProperties;
        $self['searchableProperties'] = $searchableProperties;
        $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        null !== $description && $self['description'] = $description;
        null !== $primaryDisplayProperty && $self['primaryDisplayProperty'] = $primaryDisplayProperty;

        return $self;
    }

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $self = clone $this;
        $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;

        return $self;
    }

    /**
     * Associations defined for this object type.
     *
     * @param list<string> $associatedObjects
     */
    public function withAssociatedObjects(array $associatedObjects): self
    {
        $self = clone $this;
        $self['associatedObjects'] = $associatedObjects;

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
     * A unique name for this object. For internal use only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Properties defined for this object type.
     *
     * @param list<ObjectTypePropertyCreate|ObjectTypePropertyCreateShape> $properties
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
}
