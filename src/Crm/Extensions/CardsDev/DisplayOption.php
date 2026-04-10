<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Extensions\CardsDev\DisplayOption\Type;

/**
 * @phpstan-type DisplayOptionShape = array{
 *   label: string, name: string, type: Type|value-of<Type>
 * }
 */
final class DisplayOption implements BaseModel
{
    /** @use SdkModel<DisplayOptionShape> */
    use SdkModel;

    /**
     * The text that will be displayed to users for this option.
     */
    #[Required]
    public string $label;

    /**
     * JSON-friendly unique name for option.
     */
    #[Required]
    public string $name;

    /**
     * The type of status.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
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
        $self = new self;

        $self['label'] = $label;
        $self['name'] = $name;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The text that will be displayed to users for this option.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * JSON-friendly unique name for option.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The type of status.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
