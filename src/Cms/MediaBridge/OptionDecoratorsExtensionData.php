<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type OptionDecoratorsExtensionDataShape = array{
 *   optionDecorators: array<string, OptionDecorations>,
 *   optionDecoratorStyle: string,
 * }
 */
final class OptionDecoratorsExtensionData implements BaseModel
{
    /** @use SdkModel<OptionDecoratorsExtensionDataShape> */
    use SdkModel;

    /** @var array<string, OptionDecorations> $optionDecorators */
    #[Api(map: OptionDecorations::class)]
    public array $optionDecorators;

    #[Api]
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
     * @param array<string, OptionDecorations> $optionDecorators
     */
    public static function with(
        array $optionDecorators,
        string $optionDecoratorStyle
    ): self {
        $obj = new self;

        $obj->optionDecorators = $optionDecorators;
        $obj->optionDecoratorStyle = $optionDecoratorStyle;

        return $obj;
    }

    /**
     * @param array<string, OptionDecorations> $optionDecorators
     */
    public function withOptionDecorators(array $optionDecorators): self
    {
        $obj = clone $this;
        $obj->optionDecorators = $optionDecorators;

        return $obj;
    }

    public function withOptionDecoratorStyle(string $optionDecoratorStyle): self
    {
        $obj = clone $this;
        $obj->optionDecoratorStyle = $optionDecoratorStyle;

        return $obj;
    }
}
