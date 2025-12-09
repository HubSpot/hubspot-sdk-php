<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicDividerStyleSettingsShape = array{
 *   color?: mixed, height?: int|null, lineType?: string|null
 * }
 */
final class PublicDividerStyleSettings implements BaseModel
{
    /** @use SdkModel<PublicDividerStyleSettingsShape> */
    use SdkModel;

    #[Optional]
    public mixed $color;

    #[Optional]
    public ?int $height;

    #[Optional]
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
        $self = new self;

        null !== $color && $self['color'] = $color;
        null !== $height && $self['height'] = $height;
        null !== $lineType && $self['lineType'] = $lineType;

        return $self;
    }

    public function withColor(mixed $color): self
    {
        $self = clone $this;
        $self['color'] = $color;

        return $self;
    }

    public function withHeight(int $height): self
    {
        $self = clone $this;
        $self['height'] = $height;

        return $self;
    }

    public function withLineType(string $lineType): self
    {
        $self = clone $this;
        $self['lineType'] = $lineType;

        return $self;
    }
}
