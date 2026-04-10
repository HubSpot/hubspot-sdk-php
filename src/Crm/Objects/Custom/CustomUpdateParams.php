<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects\Custom;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Perform a partial update of an Object identified by `{objectId}`or optionally a unique property value as specified by the `idProperty` query param. `{objectId}` refers to the internal object ID by default, and the `idProperty` query param refers to a property whose values are unique for the object. Provided property values will be overwritten. Read-only and non-existent properties will result in an error. Properties values can be cleared by passing an empty string.
 *
 * @see HubSpotSDK\Services\Crm\Objects\CustomService::update()
 *
 * @phpstan-type CustomUpdateParamsShape = array{
 *   objectType: string, properties: array<string,string>, idProperty?: string|null
 * }
 */
final class CustomUpdateParams implements BaseModel
{
    /** @use SdkModel<CustomUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * The name of a property whose values are unique for this object type.
     */
    #[Optional]
    public ?string $idProperty;

    /**
     * `new CustomUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomUpdateParams::with(objectType: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomUpdateParams)->withObjectType(...)->withProperties(...)
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
     * @param array<string,string> $properties
     */
    public static function with(
        string $objectType,
        array $properties,
        ?string $idProperty = null
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['properties'] = $properties;

        null !== $idProperty && $self['idProperty'] = $idProperty;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * Key value pairs representing the properties of the object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * The name of a property whose values are unique for this object type.
     */
    public function withIDProperty(string $idProperty): self
    {
        $self = clone $this;
        $self['idProperty'] = $idProperty;

        return $self;
    }
}
