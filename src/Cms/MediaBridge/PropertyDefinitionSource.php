<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\PropertyDefinitionSource\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PropertyDefinitionSourceShape = array{
 *   type: value-of<Type>, name?: string|null
 * }
 */
final class PropertyDefinitionSource implements BaseModel
{
    /** @use SdkModel<PropertyDefinitionSourceShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $name;

    /**
     * `new PropertyDefinitionSource()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyDefinitionSource::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyDefinitionSource)->withType(...)
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
    public static function with(Type|string $type, ?string $name = null): self
    {
        $obj = new self;

        $obj['type'] = $type;

        null !== $name && $obj->name = $name;

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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
