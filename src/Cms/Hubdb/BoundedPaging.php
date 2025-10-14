<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type bounded_paging = array{next?: BoundedNextPage}
 */
final class BoundedPaging implements BaseModel
{
    /** @use SdkModel<bounded_paging> */
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
     */
    public static function with(?BoundedNextPage $next = null): self
    {
        $obj = new self;

        null !== $next && $obj->next = $next;

        return $obj;
    }

    public function withNext(BoundedNextPage $next): self
    {
        $obj = clone $this;
        $obj->next = $next;

        return $obj;
    }
}
