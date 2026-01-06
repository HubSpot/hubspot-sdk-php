<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Schemas;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * Update the schema for an existing object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\SchemasService::update()
 *
 * @phpstan-type SchemaUpdateParamsShape = array{
 *   appID: int,
 *   clearDescription?: bool,
 *   description?: string,
 *   labels?: ObjectTypeDefinitionLabels|array{
 *     plural?: string|null, singular?: string|null
 *   },
 *   primaryDisplayProperty?: string,
 *   requiredProperties?: list<string>,
 *   restorable?: bool,
 *   searchableProperties?: list<string>,
 *   secondaryDisplayProperties?: list<string>,
 * }
 */
final class SchemaUpdateParams implements BaseModel
{
    /** @use SdkModel<SchemaUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

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

    /**
     * `new SchemaUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaUpdateParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaUpdateParams)->withAppID(...)
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
     * @param ObjectTypeDefinitionLabels|array{
     *   plural?: string|null, singular?: string|null
     * } $labels
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        int $appID,
        ?bool $clearDescription = null,
        ?string $description = null,
        ObjectTypeDefinitionLabels|array|null $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
    ): self {
        $obj = new self;

        $obj['appID'] = $appID;

        null !== $clearDescription && $obj['clearDescription'] = $clearDescription;
        null !== $description && $obj['description'] = $description;
        null !== $labels && $obj['labels'] = $labels;
        null !== $primaryDisplayProperty && $obj['primaryDisplayProperty'] = $primaryDisplayProperty;
        null !== $requiredProperties && $obj['requiredProperties'] = $requiredProperties;
        null !== $restorable && $obj['restorable'] = $restorable;
        null !== $searchableProperties && $obj['searchableProperties'] = $searchableProperties;
        null !== $secondaryDisplayProperties && $obj['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appID'] = $appID;

        return $obj;
    }

    public function withClearDescription(bool $clearDescription): self
    {
        $obj = clone $this;
        $obj['clearDescription'] = $clearDescription;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * @param ObjectTypeDefinitionLabels|array{
     *   plural?: string|null, singular?: string|null
     * } $labels
     */
    public function withLabels(ObjectTypeDefinitionLabels|array $labels): self
    {
        $obj = clone $this;
        $obj['labels'] = $labels;

        return $obj;
    }

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $obj = clone $this;
        $obj['primaryDisplayProperty'] = $primaryDisplayProperty;

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
        $obj['requiredProperties'] = $requiredProperties;

        return $obj;
    }

    public function withRestorable(bool $restorable): self
    {
        $obj = clone $this;
        $obj['restorable'] = $restorable;

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
        $obj['searchableProperties'] = $searchableProperties;

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
        $obj['secondaryDisplayProperties'] = $secondaryDisplayProperties;

        return $obj;
    }
}
