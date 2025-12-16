<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BoundedNextPageShape from \HubspotSDK\Cms\Hubdb\BoundedNextPage
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
     * @param BoundedNextPageShape $next
     */
    public static function with(BoundedNextPage|array|null $next = null): self
    {
        $self = new self;

        null !== $next && $self['next'] = $next;

        return $self;
    }

    /**
     * @param BoundedNextPageShape $next
     */
    public function withNext(BoundedNextPage|array $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }
}
