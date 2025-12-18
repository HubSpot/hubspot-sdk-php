<?php

declare(strict_types=1);

namespace HubspotSDK\Page;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Page\Paging\Next;

/**
 * @phpstan-import-type NextShape from \HubspotSDK\Page\Paging\Next
 *
 * @phpstan-type PagingShape = array{next?: null|Next|NextShape}
 */
final class Paging implements BaseModel
{
    /** @use SdkModel<PagingShape> */
    use SdkModel;

    #[Optional]
    public ?Next $next;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Next|NextShape|null $next
     */
    public static function with(Next|array|null $next = null): self
    {
        $self = new self;

        null !== $next && $self['next'] = $next;

        return $self;
    }

    /**
     * @param Next|NextShape $next
     */
    public function withNext(Next|array $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }
}
