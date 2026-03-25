<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NextPageShape from \HubspotSDK\NextPage
 * @phpstan-import-type PreviousPageShape from \HubspotSDK\PreviousPage
 *
 * @phpstan-type PagingShape = array{
 *   next?: null|NextPage|NextPageShape, prev?: null|PreviousPage|PreviousPageShape
 * }
 */
final class Paging implements BaseModel
{
    /** @use SdkModel<PagingShape> */
    use SdkModel;

    /**
     * Specifies the paging information needed to retrieve the next set of results in a paginated API response.
     */
    #[Optional]
    public ?NextPage $next;

    /**
     * specifies the paging information needed to retrieve the previous set of results in a paginated API response.
     */
    #[Optional]
    public ?PreviousPage $prev;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NextPage|NextPageShape|null $next
     * @param PreviousPage|PreviousPageShape|null $prev
     */
    public static function with(
        NextPage|array|null $next = null,
        PreviousPage|array|null $prev = null
    ): self {
        $self = new self;

        null !== $next && $self['next'] = $next;
        null !== $prev && $self['prev'] = $prev;

        return $self;
    }

    /**
     * Specifies the paging information needed to retrieve the next set of results in a paginated API response.
     *
     * @param NextPage|NextPageShape $next
     */
    public function withNext(NextPage|array $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }

    /**
     * specifies the paging information needed to retrieve the previous set of results in a paginated API response.
     *
     * @param PreviousPage|PreviousPageShape $prev
     */
    public function withPrev(PreviousPage|array $prev): self
    {
        $self = clone $this;
        $self['prev'] = $prev;

        return $self;
    }
}
