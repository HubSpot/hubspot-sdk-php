<?php

declare(strict_types=1);

namespace HubspotSDK\CursorURLPage;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CursorURLPage\Paging\Next;

/**
 * @phpstan-type paging_alias = array{next?: Next}
 */
final class Paging implements BaseModel
{
    /** @use SdkModel<paging_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Next $next;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Next $next = null): self
    {
        $obj = new self;

        null !== $next && $obj->next = $next;

        return $obj;
    }

    public function withNext(Next $next): self
    {
        $obj = clone $this;
        $obj->next = $next;

        return $obj;
    }
}
