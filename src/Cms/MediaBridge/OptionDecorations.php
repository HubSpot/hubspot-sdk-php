<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\OptionDecorations\Color;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type OptionDecorationsShape = array{color: Color|value-of<Color>}
 */
final class OptionDecorations implements BaseModel
{
    /** @use SdkModel<OptionDecorationsShape> */
    use SdkModel;

    /** @var value-of<Color> $color */
    #[Required(enum: Color::class)]
    public string $color;

    /**
     * `new OptionDecorations()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OptionDecorations::with(color: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OptionDecorations)->withColor(...)
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
     * @param Color|value-of<Color> $color
     */
    public static function with(Color|string $color): self
    {
        $self = new self;

        $self['color'] = $color;

        return $self;
    }

    /**
     * @param Color|value-of<Color> $color
     */
    public function withColor(Color|string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }
}
