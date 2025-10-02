<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type paging_alias = array{next?: NextPage, prev?: PreviousPage}
 */
final class Paging implements BaseModel
{
    /** @use SdkModel<paging_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?NextPage $next;

    #[Api(optional: true)]
    public ?PreviousPage $prev;

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
        ?NextPage $next = null,
        ?PreviousPage $prev = null
    ): self {
        $obj = new self;

        null !== $next && $obj->next = $next;
        null !== $prev && $obj->prev = $prev;

        return $obj;
    }

    public function withNext(NextPage $next): self
    {
        $obj = clone $this;
        $obj->next = $next;

        return $obj;
    }

    public function withPrev(PreviousPage $prev): self
    {
        $obj = clone $this;
        $obj->prev = $prev;

        return $obj;
    }
}
