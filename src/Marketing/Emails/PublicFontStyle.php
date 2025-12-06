<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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

    #[Api(optional: true)]
    public ?bool $bold;

    #[Api(optional: true)]
    public ?string $color;

    #[Api(optional: true)]
    public ?string $font;

    #[Api(optional: true)]
    public ?bool $italic;

    #[Api(optional: true)]
    public ?int $size;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $bold && $obj['bold'] = $bold;
        null !== $color && $obj['color'] = $color;
        null !== $font && $obj['font'] = $font;
        null !== $italic && $obj['italic'] = $italic;
        null !== $size && $obj['size'] = $size;
        null !== $underline && $obj['underline'] = $underline;

        return $obj;
    }

    public function withBold(bool $bold): self
    {
        $obj = clone $this;
        $obj['bold'] = $bold;

        return $obj;
    }

    public function withColor(string $color): self
    {
        $obj = clone $this;
        $obj['color'] = $color;

        return $obj;
    }

    public function withFont(string $font): self
    {
        $obj = clone $this;
        $obj['font'] = $font;

        return $obj;
    }

    public function withItalic(bool $italic): self
    {
        $obj = clone $this;
        $obj['italic'] = $italic;

        return $obj;
    }

    public function withSize(int $size): self
    {
        $obj = clone $this;
        $obj['size'] = $size;

        return $obj;
    }

    public function withUnderline(bool $underline): self
    {
        $obj = clone $this;
        $obj['underline'] = $underline;

        return $obj;
    }
}
