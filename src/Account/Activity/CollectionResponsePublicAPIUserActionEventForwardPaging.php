<?php

declare(strict_types=1);

namespace HubSpotSDK\Account\Activity;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ForwardPaging;

/**
 * @phpstan-import-type PublicAPIUserActionEventShape from \HubSpotSDK\Account\Activity\PublicAPIUserActionEvent
 * @phpstan-import-type ForwardPagingShape from \HubSpotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponsePublicAPIUserActionEventForwardPagingShape = array{
 *   results: list<PublicAPIUserActionEvent|PublicAPIUserActionEventShape>,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponsePublicAPIUserActionEventForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicAPIUserActionEventForwardPagingShape> */
    use SdkModel;

    /** @var list<PublicAPIUserActionEvent> $results */
    #[Required(list: PublicAPIUserActionEvent::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponsePublicAPIUserActionEventForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicAPIUserActionEventForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicAPIUserActionEventForwardPaging)->withResults(...)
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
     *
     * @param list<PublicAPIUserActionEvent|PublicAPIUserActionEventShape> $results
     * @param ForwardPaging|ForwardPagingShape|null $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<PublicAPIUserActionEvent|PublicAPIUserActionEventShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|ForwardPagingShape $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
