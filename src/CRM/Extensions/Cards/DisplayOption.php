<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Extensions\Cards\DisplayOption\Type;

/**
 * Option definition for STATUS dataTypes.
 *
 * @phpstan-type display_option = array{
 *   label: string, name: string, type: value-of<Type>
 * }
 */
final class DisplayOption implements BaseModel
{
    /** @use SdkModel<display_option> */
    use SdkModel;

    /**
     * The text that will be displayed to users for this option.
     */
    #[Api]
    public string $label;

    /**
     * JSON-friendly unique name for option.
     */
    #[Api]
    public string $name;

    /**
     * The type of status.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new DisplayOption()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DisplayOption::with(label: ..., name: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DisplayOption)->withLabel(...)->withName(...)->withType(...)
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
        string $label,
        string $name,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->label = $label;
        $obj->name = $name;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The text that will be displayed to users for this option.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * JSON-friendly unique name for option.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The type of status.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
