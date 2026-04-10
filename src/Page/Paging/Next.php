<?php

declare(strict_types=1);

namespace HubSpotSDK\Page\Paging;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type NextShape = array{after?: string|null}
 */
final class Next implements BaseModel
{
    /** @use SdkModel<NextShape> */
    use SdkModel;

    #[Optional]
    public ?string $after;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $after = null): self
    {
        $self = new self;

        null !== $after && $self['after'] = $after;

        return $self;
    }

    public function withAfter(string $after): self
    {
        $self = clone $this;
        $self['after'] = $after;

        return $self;
    }
}
