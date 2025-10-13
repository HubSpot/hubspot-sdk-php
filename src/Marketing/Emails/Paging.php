<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\PreviousPage;

/**
 * @phpstan-type paging_alias = array{next: NextPage, prev?: PreviousPage}
 */
final class Paging implements BaseModel
{
    /** @use SdkModel<paging_alias> */
    use SdkModel;

    #[Api]
    public NextPage $next;

    #[Api(optional: true)]
    public ?PreviousPage $prev;

    /**
     * `new Paging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Paging::with(next: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Paging)->withNext(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(NextPage $next, ?PreviousPage $prev = null): self
    {
        $obj = new self;

        $obj->next = $next;

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
