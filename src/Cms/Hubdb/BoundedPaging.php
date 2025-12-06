<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type BoundedPagingShape = array{next?: BoundedNextPage|null}
 */
final class BoundedPaging implements BaseModel
{
    /** @use SdkModel<BoundedPagingShape> */
    use SdkModel;

    #[Api(optional: true)]
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
     * @param BoundedNextPage|array{offset: int, link?: string|null} $next
     */
    public static function with(BoundedNextPage|array|null $next = null): self
    {
        $obj = new self;

        null !== $next && $obj['next'] = $next;

        return $obj;
    }

    /**
     * @param BoundedNextPage|array{offset: int, link?: string|null} $next
     */
    public function withNext(BoundedNextPage|array $next): self
    {
        $obj = clone $this;
        $obj['next'] = $next;

        return $obj;
    }
}
