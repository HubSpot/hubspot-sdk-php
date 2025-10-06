<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIEnumerationOutputField\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_enumeration_output_field = array{
 *   name: string, options: list<string>, type: value-of<Type>
 * }
 */
final class APIEnumerationOutputField implements BaseModel
{
    /** @use SdkModel<api_enumeration_output_field> */
    use SdkModel;

    #[Api]
    public string $name;

    /** @var list<string> $options */
    #[Api(list: 'string')]
    public array $options;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
        $obj = new self;

        $obj->name = $name;
        $obj->options = $options;
        $obj['type'] = $type;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<string> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
