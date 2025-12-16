<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-import-type HydratedCriticalActionShape from \HubspotSDK\Account\Activity\HydratedCriticalAction
 * @phpstan-import-type ForwardPagingShape from \HubspotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponseHydratedCriticalActionForwardPagingShape = array{
 *   results: list<HydratedCriticalActionShape>,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponseHydratedCriticalActionForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseHydratedCriticalActionForwardPagingShape> */
    use SdkModel;

    /** @var list<HydratedCriticalAction> $results */
    #[Required(list: HydratedCriticalAction::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseHydratedCriticalActionForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseHydratedCriticalActionForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseHydratedCriticalActionForwardPaging)->withResults(...)
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
     * @param list<HydratedCriticalActionShape> $results
     * @param ForwardPagingShape $paging
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
     * @param list<HydratedCriticalActionShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPagingShape $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
