<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ObjectTypeDefinitionLabels;

/**
 * Update the details for an existing object schema.
 *
 * @see HubspotSDK\CRM\Objects\Schemas->update
 *
 * @phpstan-type SchemaUpdateParamsShape = array{
 *   clearDescription?: bool,
 *   description?: string,
 *   labels?: ObjectTypeDefinitionLabels,
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

    #[Api(optional: true)]
    public ?bool $clearDescription;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?ObjectTypeDefinitionLabels $labels;

    /**
     * The name of the primary property for this object. This will be displayed as primary on the HubSpot record page for this object type.
     */
    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

    /**
     * The names of properties that should be **required** when creating an object of this type.
     *
     * @var list<string>|null $requiredProperties
     */
    #[Api(list: 'string', optional: true)]
    public ?array $requiredProperties;

    #[Api(optional: true)]
    public ?bool $restorable;

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
        ?bool $clearDescription = null,
        ?string $description = null,
        ?ObjectTypeDefinitionLabels $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
    ): self {
        $obj = new self;

        null !== $clearDescription && $obj->clearDescription = $clearDescription;
        null !== $description && $obj->description = $description;
        null !== $labels && $obj->labels = $labels;
        null !== $primaryDisplayProperty && $obj->primaryDisplayProperty = $primaryDisplayProperty;
        null !== $requiredProperties && $obj->requiredProperties = $requiredProperties;
        null !== $restorable && $obj->restorable = $restorable;
        null !== $searchableProperties && $obj->searchableProperties = $searchableProperties;
        null !== $secondaryDisplayProperties && $obj->secondaryDisplayProperties = $secondaryDisplayProperties;

        return $obj;
    }

    public function withClearDescription(bool $clearDescription): self
    {
        $obj = clone $this;
        $obj->clearDescription = $clearDescription;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withLabels(ObjectTypeDefinitionLabels $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

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

    public function withRestorable(bool $restorable): self
    {
        $obj = clone $this;
        $obj->restorable = $restorable;

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
}
