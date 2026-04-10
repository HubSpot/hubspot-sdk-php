<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Hubdb;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BoundedNextPageShape from \HubSpotSDK\Cms\Hubdb\BoundedNextPage
 *
 * @phpstan-type BoundedPagingShape = array{
 *   next?: null|BoundedNextPage|BoundedNextPageShape
 * }
 */
final class BoundedPaging implements BaseModel
{
    /** @use SdkModel<BoundedPagingShape> */
    use SdkModel;

    #[Optional]
    public ?BoundedNextPage $next;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param BoundedNextPage|BoundedNextPageShape|null $next
     */
    public static function with(BoundedNextPage|array|null $next = null): self
    {
        $self = new self;

        null !== $next && $self['next'] = $next;

        return $self;
    }

    /**
     * @param BoundedNextPage|BoundedNextPageShape $next
     */
    public function withNext(BoundedNextPage|array $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }
}
