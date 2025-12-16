<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIEnumerationOutputField\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIEnumerationOutputFieldShape = array{
 *   name: string, options: list<string>, type: Type|value-of<Type>
 * }
 */
final class APIEnumerationOutputField implements BaseModel
{
    /** @use SdkModel<APIEnumerationOutputFieldShape> */
    use SdkModel;

    #[Required]
    public string $name;

    /** @var list<string> $options */
    #[Required(list: 'string')]
    public array $options;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIEnumerationOutputField()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIEnumerationOutputField::with(name: ..., options: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIEnumerationOutputField)->withName(...)->withOptions(...)->withType(...)
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
     * @param list<string> $options
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $name,
        array $options,
        Type|string $type = 'ENUMERATION'
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['options'] = $options;
        $self['type'] = $type;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param list<string> $options
     */
    public function withOptions(array $options): self
    {
        $self = clone $this;
        $self['options'] = $options;

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
