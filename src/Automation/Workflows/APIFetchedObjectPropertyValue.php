<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIFetchedObjectPropertyValue\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIFetchedObjectPropertyValueShape = array{
 *   propertyToken: string, type: value-of<Type>
 * }
 */
final class APIFetchedObjectPropertyValue implements BaseModel
{
    /** @use SdkModel<APIFetchedObjectPropertyValueShape> */
    use SdkModel;

    #[Required]
    public string $propertyToken;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIFetchedObjectPropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIFetchedObjectPropertyValue::with(propertyToken: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIFetchedObjectPropertyValue)->withPropertyToken(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $propertyToken,
        Type|string $type = 'FETCHED_OBJECT_PROPERTY'
    ): self {
        $self = new self;

        $self['propertyToken'] = $propertyToken;
        $self['type'] = $type;

        return $self;
    }

    public function withPropertyToken(string $propertyToken): self
    {
        $self = clone $this;
        $self['propertyToken'] = $propertyToken;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
