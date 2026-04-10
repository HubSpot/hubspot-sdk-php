<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicFontStyleShape = array{
 *   bold?: bool|null,
 *   color?: string|null,
 *   font?: string|null,
 *   italic?: bool|null,
 *   size?: int|null,
 *   underline?: bool|null,
 * }
 */
final class PublicFontStyle implements BaseModel
{
    /** @use SdkModel<PublicFontStyleShape> */
    use SdkModel;

    #[Optional]
    public ?bool $bold;

    #[Optional]
    public ?string $color;

    #[Optional]
    public ?string $font;

    #[Optional]
    public ?bool $italic;

    #[Optional]
    public ?int $size;

    #[Optional]
    public ?bool $underline;

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
        ?bool $bold = null,
        ?string $color = null,
        ?string $font = null,
        ?bool $italic = null,
        ?int $size = null,
        ?bool $underline = null,
    ): self {
        $self = new self;

        null !== $bold && $self['bold'] = $bold;
        null !== $color && $self['color'] = $color;
        null !== $font && $self['font'] = $font;
        null !== $italic && $self['italic'] = $italic;
        null !== $size && $self['size'] = $size;
        null !== $underline && $self['underline'] = $underline;

        return $self;
    }

    public function withBold(bool $bold): self
    {
        $self = clone $this;
        $self['bold'] = $bold;

        return $self;
    }

    public function withColor(string $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    public function withFont(string $font): self
    {
        $self = clone $this;
        $self['font'] = $font;

        return $self;
    }

    public function withItalic(bool $italic): self
    {
        $self = clone $this;
        $self['italic'] = $italic;

        return $self;
    }

    public function withSize(int $size): self
    {
        $self = clone $this;
        $self['size'] = $size;

        return $self;
    }

    public function withUnderline(bool $underline): self
    {
        $self = clone $this;
        $self['underline'] = $underline;

        return $self;
    }
}
