<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\ObjectSchemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMObjectTypeDefinitionLabels;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ObjectSchemaUpdateParams); // set properties as needed
 * $client->crm.objectSchemas->update(...$params->toArray());
 * ```
 * Update a schema.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objectSchemas->update(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\ObjectSchemas->update
 *
 * @phpstan-type object_schema_update_params = array{
 *   clearDescription?: bool,
 *   labels?: CRMObjectTypeDefinitionLabels,
 *   primaryDisplayProperty?: string,
 *   requiredProperties?: list<string>,
 *   restorable?: bool,
 *   searchableProperties?: list<string>,
 *   secondaryDisplayProperties?: list<string>,
 * }
 */
final class ObjectSchemaUpdateParams implements BaseModel
{
    /** @use SdkModel<object_schema_update_params> */
    use SdkModel;
    use SdkParams;

    #[Api(optional: true)]
    public ?bool $clearDescription;

    #[Api(optional: true)]
    public ?CRMObjectTypeDefinitionLabels $labels;

    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

    /** @var list<string>|null $requiredProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $requiredProperties;

    #[Api(optional: true)]
    public ?bool $restorable;

    /** @var list<string>|null $searchableProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $searchableProperties;

    /** @var list<string>|null $secondaryDisplayProperties */
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
        ?CRMObjectTypeDefinitionLabels $labels = null,
        ?string $primaryDisplayProperty = null,
        ?array $requiredProperties = null,
        ?bool $restorable = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
    ): self {
        $obj = new self;

        null !== $clearDescription && $obj->clearDescription = $clearDescription;
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

    public function withLabels(CRMObjectTypeDefinitionLabels $labels): self
    {
        $obj = clone $this;
        $obj->labels = $labels;

        return $obj;
    }

    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $obj = clone $this;
        $obj->primaryDisplayProperty = $primaryDisplayProperty;

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

    public function withRestorable(bool $restorable): self
    {
        $obj = clone $this;
        $obj->restorable = $restorable;

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
}
