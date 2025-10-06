<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_divider_style_settings = array{
 *   color?: mixed, height?: int, lineType?: string
 * }
 */
final class PublicDividerStyleSettings implements BaseModel
{
    /** @use SdkModel<public_divider_style_settings> */
    use SdkModel;

    #[Api(optional: true)]
    public mixed $color;

    #[Api(optional: true)]
    public ?int $height;

    #[Api(optional: true)]
    public ?string $lineType;

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
        mixed $color = null,
        ?int $height = null,
        ?string $lineType = null
    ): self {
        $obj = new self;

        null !== $color && $obj->color = $color;
        null !== $height && $obj->height = $height;
        null !== $lineType && $obj->lineType = $lineType;

        return $obj;
    }

    public function withColor(mixed $color): self
    {
        $obj = clone $this;
        $obj->color = $color;

        return $obj;
    }

    public function withHeight(int $height): self
    {
        $obj = clone $this;
        $obj->height = $height;

        return $obj;
    }

    public function withLineType(string $lineType): self
    {
        $obj = clone $this;
        $obj->lineType = $lineType;

        return $obj;
    }
}
