<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_button_style_settings = array{
 *   backgroundColor?: mixed, cornerRadius?: int, fontStyle?: PublicFontStyle
 * }
 */
final class PublicButtonStyleSettings implements BaseModel
{
    /** @use SdkModel<public_button_style_settings> */
    use SdkModel;

    #[Api(optional: true)]
    public mixed $backgroundColor;

    #[Api(optional: true)]
    public ?int $cornerRadius;

    #[Api(optional: true)]
    public ?PublicFontStyle $fontStyle;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        mixed $backgroundColor = null,
        ?int $cornerRadius = null,
        ?PublicFontStyle $fontStyle = null,
    ): self {
        $obj = new self;

        null !== $backgroundColor && $obj->backgroundColor = $backgroundColor;
        null !== $cornerRadius && $obj->cornerRadius = $cornerRadius;
        null !== $fontStyle && $obj->fontStyle = $fontStyle;

        return $obj;
    }

    public function withBackgroundColor(mixed $backgroundColor): self
    {
        $obj = clone $this;
        $obj->backgroundColor = $backgroundColor;

        return $obj;
    }

    public function withCornerRadius(int $cornerRadius): self
    {
        $obj = clone $this;
        $obj->cornerRadius = $cornerRadius;

        return $obj;
    }

    public function withFontStyle(PublicFontStyle $fontStyle): self
    {
        $obj = clone $this;
        $obj->fontStyle = $fontStyle;

        return $obj;
    }
}
