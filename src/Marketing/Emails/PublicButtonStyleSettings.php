<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicButtonStyleSettingsShape = array{
 *   backgroundColor?: mixed,
 *   cornerRadius?: int|null,
 *   fontStyle?: PublicFontStyle|null,
 * }
 */
final class PublicButtonStyleSettings implements BaseModel
{
    /** @use SdkModel<PublicButtonStyleSettingsShape> */
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
     *
     * @param PublicFontStyle|array{
     *   bold?: bool|null,
     *   color?: string|null,
     *   font?: string|null,
     *   italic?: bool|null,
     *   size?: int|null,
     *   underline?: bool|null,
     * } $fontStyle
     */
    public static function with(
        mixed $backgroundColor = null,
        ?int $cornerRadius = null,
        PublicFontStyle|array|null $fontStyle = null,
    ): self {
        $obj = new self;

        null !== $backgroundColor && $obj['backgroundColor'] = $backgroundColor;
        null !== $cornerRadius && $obj['cornerRadius'] = $cornerRadius;
        null !== $fontStyle && $obj['fontStyle'] = $fontStyle;

        return $obj;
    }

    public function withBackgroundColor(mixed $backgroundColor): self
    {
        $obj = clone $this;
        $obj['backgroundColor'] = $backgroundColor;

        return $obj;
    }

    public function withCornerRadius(int $cornerRadius): self
    {
        $obj = clone $this;
        $obj['cornerRadius'] = $cornerRadius;

        return $obj;
    }

    /**
     * @param PublicFontStyle|array{
     *   bold?: bool|null,
     *   color?: string|null,
     *   font?: string|null,
     *   italic?: bool|null,
     *   size?: int|null,
     *   underline?: bool|null,
     * } $fontStyle
     */
    public function withFontStyle(PublicFontStyle|array $fontStyle): self
    {
        $obj = clone $this;
        $obj['fontStyle'] = $fontStyle;

        return $obj;
    }
}
