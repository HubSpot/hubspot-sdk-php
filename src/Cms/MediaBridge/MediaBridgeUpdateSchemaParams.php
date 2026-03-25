<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * Update the schema for an existing object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::updateSchema()
 *
 * @phpstan-import-type ObjectTypeDefinitionLabelsShape from \HubspotSDK\ObjectTypeDefinitionLabels
 *
 * @phpstan-type MediaBridgeUpdateSchemaParamsShape = array{
 *   appID: string,
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
final class MediaBridgeUpdateSchemaParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeUpdateSchemaParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $appID;

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
     * `new MediaBridgeUpdateSchemaParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeUpdateSchemaParams::with(appID: ..., clearDescription: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeUpdateSchemaParams)->withAppID(...)->withClearDescription(...)
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
        string $appID,
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

        $self['appID'] = $appID;
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

    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

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
