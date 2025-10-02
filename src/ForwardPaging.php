<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type forward_paging = array{next?: NextPage}
 */
final class ForwardPaging implements BaseModel
{
    /** @use SdkModel<forward_paging> */
    use SdkModel;

    #[Api(optional: true)]
    public ?NextPage $next;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?NextPage $next = null): self
    {
        $obj = new self;

        null !== $next && $obj->next = $next;

        return $obj;
    }

    public function withNext(NextPage $next): self
    {
        $obj = clone $this;
        $obj->next = $next;

        return $obj;
    }
}
