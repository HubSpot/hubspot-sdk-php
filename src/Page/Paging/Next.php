<?php

declare(strict_types=1);

namespace HubspotSDK\Page\Paging;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

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
