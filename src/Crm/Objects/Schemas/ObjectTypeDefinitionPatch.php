<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Schemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * Defines attributes to update on an object type.
 *
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 *
 * @phpstan-type ObjectTypeDefinitionPatchShape = array{
 *   clearDescription?: bool|null,
 *   description?: string|null,
 *   labels?: null|ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
 *   primaryDisplayProperty?: string|null,
 *   requiredProperties?: list<string>|null,
 *   restorable?: bool|null,
 *   searchableProperties?: list<string>|null,
 *   secondaryDisplayProperties?: list<string>|null,
 * }
 */
final class ObjectTypeDefinitionPatch implements BaseModel
{
    /** @use SdkModel<ObjectTypeDefinitionPatchShape> */
    use SdkModel;

    #[Optional]
    public ?bool $clearDescription;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?ObjectTypeDefinitionLabels $labels;

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    #[Optional]
    public ?string $primaryDisplayProperty;

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @var list<string>|null $requiredProperties
     */
    #[Optional(list: 'string')]
    public ?array $requiredProperties;

    #[Optional]
    public ?bool $restorable;

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
        ?bool $clearDescription = null,
        ?string $description = null,
        ObjectTypeDefinitionLabels|array|null $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
    ): self {
        $self = new self;

        null !== $clearDescription && $self['clearDescription'] = $clearDescription;
        null !== $description && $self['description'] = $description;
        null !== $labels && $self['labels'] = $labels;
        null !== $primaryDisplayProperty && $self['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $requiredProperties && $self['requiredProperties'] = $requiredProperties;
        null !== $restorable && $self['restorable'] = $restorable;
        null !== $searchableProperties && $self['searchableProperties'] = $searchableProperties;
        null !== $secondaryDisplayProperties && $self['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $self;
    }

    public function withClearDescription(bool $clearDescription): self
    {
        $self = clone $this;
        $self['clearDescription'] = $clearDescription;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

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

    public function withRestorable(bool $restorable): self
    {
        $self = clone $this;
        $self['restorable'] = $restorable;

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
}
