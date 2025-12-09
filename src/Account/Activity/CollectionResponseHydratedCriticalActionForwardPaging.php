<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseHydratedCriticalActionForwardPagingShape = array{
 *   results: list<HydratedCriticalAction>, paging?: ForwardPaging|null
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
     * @param list<HydratedCriticalAction|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   type: string,
     *   userId: int,
     *   actingUser?: string|null,
     *   countryCode?: string|null,
     *   infoUrl?: string|null,
     *   ipAddress?: string|null,
     *   location?: string|null,
     *   objectId?: string|null,
     *   regionCode?: string|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<HydratedCriticalAction|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   type: string,
     *   userId: int,
     *   actingUser?: string|null,
     *   countryCode?: string|null,
     *   infoUrl?: string|null,
     *   ipAddress?: string|null,
     *   location?: string|null,
     *   objectId?: string|null,
     *   regionCode?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
