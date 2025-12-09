<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ForwardPagingShape = array{next?: NextPage|null}
 */
final class ForwardPaging implements BaseModel
{
    /** @use SdkModel<ForwardPagingShape> */
    use SdkModel;

    /**
     * Specifies the paging information needed to retrieve the next set of results in a paginated API response.
     */
    #[Optional]
    public ?NextPage $next;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NextPage|array{after: string, link?: string|null} $next
     */
    public static function with(NextPage|array|null $next = null): self
    {
        $self = new self;

        null !== $next && $self['next'] = $next;

        return $self;
    }

    /**
     * Specifies the paging information needed to retrieve the next set of results in a paginated API response.
     *
     * @param NextPage|array{after: string, link?: string|null} $next
     */
    public function withNext(NextPage|array $next): self
    {
        $self = clone $this;
        $self['next'] = $next;

        return $self;
    }
}
