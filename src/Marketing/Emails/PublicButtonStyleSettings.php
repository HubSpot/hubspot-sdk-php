<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicFontStyleShape from \HubSpotSDK\Marketing\Emails\PublicFontStyle
 *
 * @phpstan-type PublicButtonStyleSettingsShape = array{
 *   backgroundColor?: mixed,
 *   cornerRadius?: int|null,
 *   fontStyle?: null|PublicFontStyle|PublicFontStyleShape,
 * }
 */
final class PublicButtonStyleSettings implements BaseModel
{
    /** @use SdkModel<PublicButtonStyleSettingsShape> */
    use SdkModel;

    #[Optional]
    public mixed $backgroundColor;

    #[Optional]
    public ?int $cornerRadius;

    #[Optional]
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
     * @param PublicFontStyle|PublicFontStyleShape|null $fontStyle
     */
    public static function with(
        mixed $backgroundColor = null,
        ?int $cornerRadius = null,
        PublicFontStyle|array|null $fontStyle = null,
    ): self {
        $self = new self;

        null !== $backgroundColor && $self['backgroundColor'] = $backgroundColor;
        null !== $cornerRadius && $self['cornerRadius'] = $cornerRadius;
        null !== $fontStyle && $self['fontStyle'] = $fontStyle;

        return $self;
    }

    public function withBackgroundColor(mixed $backgroundColor): self
    {
        $self = clone $this;
        $self['backgroundColor'] = $backgroundColor;

        return $self;
    }

    public function withCornerRadius(int $cornerRadius): self
    {
        $self = clone $this;
        $self['cornerRadius'] = $cornerRadius;

        return $self;
    }

    /**
     * @param PublicFontStyle|PublicFontStyleShape $fontStyle
     */
    public function withFontStyle(PublicFontStyle|array $fontStyle): self
    {
        $self = clone $this;
        $self['fontStyle'] = $fontStyle;

        return $self;
    }
}
