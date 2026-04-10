<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\ObjectSchemas;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ObjectTypeDefinitionLabels;

/**
 * Update attributes of a custom object schema, such as properties and labels, using the object type ID or fully qualified name.
 *
 * @see HubSpotSDK\Services\Crm\ObjectSchemasService::update()
 *
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubSpotSDK\ObjectTypeDefinitionLabels
 *
 * @phpstan-type ObjectSchemaUpdateParamsShape = array{
 *   clearDescription: bool,
 *   allowsSensitiveProperties?: bool|null,
 *   description?: string|null,
 *   labels?: null|ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape,
 *   primaryDisplayProperty?: string|null,
 *   requiredProperties?: list<string>|null,
 *   restorable?: bool|null,
 *   searchableProperties?: list<string>|null,
 *   secondaryDisplayProperties?: list<string>|null,
 * }
 */
final class ObjectSchemaUpdateParams implements BaseModel
{
    /** @use SdkModel<ObjectSchemaUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public bool $clearDescription;

    #[Optional]
    public ?bool $allowsSensitiveProperties;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?ObjectTypeDefinitionLabels $labels;

    #[Optional]
    public ?string $primaryDisplayProperty;

    /** @var list<string>|null $requiredProperties */
    #[Optional(list: 'string')]
    public ?array $requiredProperties;

    #[Optional]
    public ?bool $restorable;

    /** @var list<string>|null $searchableProperties */
    #[Optional(list: 'string')]
    public ?array $searchableProperties;

    /** @var list<string>|null $secondaryDisplayProperties */
    #[Optional(list: 'string')]
    public ?array $secondaryDisplayProperties;

    /**
     * `new ObjectSchemaUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchemaUpdateParams::with(clearDescription: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectSchemaUpdateParams)->withClearDescription(...)
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
     * @param ObjectTypeDefinitionLabels|ObjectTypeDefinitionLabelsShape|null $labels
     * @param list<string>|null $requiredProperties
     * @param list<string>|null $searchableProperties
     * @param list<string>|null $secondaryDisplayProperties
     */
    public static function with(
        bool $clearDescription,
        ?bool $allowsSensitiveProperties = null,
        ?string $description = null,
        ObjectTypeDefinitionLabels|array|null $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
    ): self {
        $self = new self;

        $self['clearDescription'] = $clearDescription;

        null !== $allowsSensitiveProperties && $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;
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

    public function withAllowsSensitiveProperties(
        bool $allowsSensitiveProperties
    ): self {
        $self = clone $this;
        $self['allowsSensitiveProperties'] = $allowsSensitiveProperties;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

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

    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $self = clone $this;
        $self['primaryDisplayProperty'] = $primaryDisplayProperty;

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

    public function withRestorable(bool $restorable): self
    {
        $self = clone $this;
        $self['restorable'] = $restorable;

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
}
