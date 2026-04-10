<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Objects;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Represents the input required to create or update a CRM object, containing an object with property names and their corresponding values.
 *
 * @phpstan-type SimplePublicObjectInputShape = array{
 *   properties: array<string,string>
 * }
 */
final class SimplePublicObjectInput implements BaseModel
{
    /** @use SdkModel<SimplePublicObjectInputShape> */
    use SdkModel;

    /**
     * Key value pairs representing the properties of the object.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * `new SimplePublicObjectInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SimplePublicObjectInput::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SimplePublicObjectInput)->withProperties(...)
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
    public static function with(array $properties): self
    {
        $self = new self;

        $self['properties'] = $properties;

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
}
