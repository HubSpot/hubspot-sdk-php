<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type cms_hubdb_bounded_paging = array{next?: CmsHubdbBoundedNextPage}
 */
final class CmsHubdbBoundedPaging implements BaseModel
{
    /** @use SdkModel<cms_hubdb_bounded_paging> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CmsHubdbBoundedNextPage $next;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?CmsHubdbBoundedNextPage $next = null): self
    {
        $obj = new self;

        null !== $next && $obj->next = $next;

        return $obj;
    }

    public function withNext(CmsHubdbBoundedNextPage $next): self
    {
        $obj = clone $this;
        $obj->next = $next;

        return $obj;
    }
}
