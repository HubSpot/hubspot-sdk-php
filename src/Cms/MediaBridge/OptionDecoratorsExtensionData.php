<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\OptionDecoratorsExtensionData\OptionDecoratorStyle;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OptionDecorationsShape from \HubspotSDK\Cms\MediaBridge\OptionDecorations
 *
 * @phpstan-type OptionDecoratorsExtensionDataShape = array{
 *   optionDecorators: array<string,OptionDecorations|OptionDecorationsShape>,
 *   optionDecoratorStyle: OptionDecoratorStyle|value-of<OptionDecoratorStyle>,
 * }
 */
final class OptionDecoratorsExtensionData implements BaseModel
{
    /** @use SdkModel<OptionDecoratorsExtensionDataShape> */
    use SdkModel;

    /** @var array<string,OptionDecorations> $optionDecorators */
    #[Required(map: OptionDecorations::class)]
    public array $optionDecorators;

    /** @var value-of<OptionDecoratorStyle> $optionDecoratorStyle */
    #[Required(enum: OptionDecoratorStyle::class)]
    public string $optionDecoratorStyle;

    /**
     * `new OptionDecoratorsExtensionData()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OptionDecoratorsExtensionData::with(
     *   optionDecorators: ..., optionDecoratorStyle: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OptionDecoratorsExtensionData)
     *   ->withOptionDecorators(...)
     *   ->withOptionDecoratorStyle(...)
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
     * @param array<string,OptionDecorations|OptionDecorationsShape> $optionDecorators
     * @param OptionDecoratorStyle|value-of<OptionDecoratorStyle> $optionDecoratorStyle
     */
    public static function with(
        array $optionDecorators,
        OptionDecoratorStyle|string $optionDecoratorStyle
    ): self {
        $self = new self;

        $self['optionDecorators'] = $optionDecorators;
        $self['optionDecoratorStyle'] = $optionDecoratorStyle;

        return $self;
    }

    /**
     * @param array<string,OptionDecorations|OptionDecorationsShape> $optionDecorators
     */
    public function withOptionDecorators(array $optionDecorators): self
    {
        $self = clone $this;
        $self['optionDecorators'] = $optionDecorators;

        return $self;
    }

    /**
     * @param OptionDecoratorStyle|value-of<OptionDecoratorStyle> $optionDecoratorStyle
     */
    public function withOptionDecoratorStyle(
        OptionDecoratorStyle|string $optionDecoratorStyle
    ): self {
        $self = clone $this;
        $self['optionDecoratorStyle'] = $optionDecoratorStyle;

        return $self;
    }
}
