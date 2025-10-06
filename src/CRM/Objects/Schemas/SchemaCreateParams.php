<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\ObjectTypeDefinitionLabels;
use HubspotSDK\CRM\ObjectTypePropertyCreate;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SchemaCreateParams); // set properties as needed
 * $client->crm.objects.schemas->create(...$params->toArray());
 * ```
 * Create a new schema.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.schemas->create(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Schemas->create
 *
 * @phpstan-type schema_create_params = array{
 *   associatedObjects: list<string>,
 *   labels: ObjectTypeDefinitionLabels,
 *   name: string,
 *   properties: list<ObjectTypePropertyCreate>,
 *   requiredProperties: list<string>,
 *   primaryDisplayProperty?: string,
 *   searchableProperties?: list<string>,
 *   secondaryDisplayProperties?: list<string>,
 * }
 */
final class SchemaCreateParams implements BaseModel
{
    /** @use SdkModel<schema_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $associatedObjects */
    #[Api(list: 'string')]
    public array $associatedObjects;

    #[Api]
    public ObjectTypeDefinitionLabels $labels;

    #[Api]
    public string $name;

    /** @var list<ObjectTypePropertyCreate> $properties */
    #[Api(list: ObjectTypePropertyCreate::class)]
    public array $properties;

    /** @var list<string> $requiredProperties */
    #[Api(list: 'string')]
    public array $requiredProperties;

    #[Api(optional: true)]
    public ?string $primaryDisplayProperty;

    /** @var list<string>|null $searchableProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $searchableProperties;

    /** @var list<string>|null $secondaryDisplayProperties */
    #[Api(list: 'string', optional: true)]
    public ?array $secondaryDisplayProperties;

    /**
     * `new SchemaCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaCreateParams::with(
     *   associatedObjects: ...,
     *   labels: ...,
     *   name: ...,
     *   properties: ...,
     *   requiredProperties: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaCreateParams)
     *   ->withAssociatedObjects(...)
     *   ->withLabels(...)
     *   ->withName(...)
     *   ->withProperties(...)
     *   ->withRequiredProperties(...)
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
     * @param list<ObjectTypePropertyCreate> $properties
     * @param list<string> $requiredProperties
     * @param list<string> $searchableProperties
     * @param list<string> $secondaryDisplayProperties
     */
    public static function with(
        array $associatedObjects,
        ObjectTypeDefinitionLabels $labels,
        string $name,
        array $properties,
        array $requiredProperties,
        ?string $primaryDisplayProperty = null,
        ?array $searchableProperties = null,
        ?array $secondaryDisplayProperties = null,
    ): self {
        $obj = new self;

        $obj->associatedObjects = $associatedObjects;
        $obj->labels = $labels;
        $obj->name = $name;
        $obj->properties = $properties;
        $obj->requiredProperties = $requiredProperties;

        null !== $primaryDisplayProperty && $obj->primaryDisplayProperty = $primaryDisplayProperty;
        null !== $searchableProperties && $obj->searchableProperties = $searchableProperties;
        null !== $secondaryDisplayProperties && $obj->secondaryDisplayProperties = $secondaryDisplayProperties;

        return $obj;
    }

    /**
     * @param list<string> $associatedObjects
     */
    public function withAssociatedObjects(array $associatedObjects): self
    {
        $obj = clone $this;
        $obj->associatedObjects = $associatedObjects;

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

    /**
     * @param list<ObjectTypePropertyCreate> $properties
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

    public function withPrimaryDisplayProperty(
        string $primaryDisplayProperty
    ): self {
        $obj = clone $this;
        $obj->primaryDisplayProperty = $primaryDisplayProperty;

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
