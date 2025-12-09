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
     *   userID: int,
     *   actingUser?: string|null,
     *   countryCode?: string|null,
     *   infoURL?: string|null,
     *   ipAddress?: string|null,
     *   location?: string|null,
     *   objectID?: string|null,
     *   regionCode?: string|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
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
     * @param list<HydratedCriticalAction|array{
     *   id: string,
     *   createdAt: \DateTimeInterface,
     *   type: string,
     *   userID: int,
     *   actingUser?: string|null,
     *   countryCode?: string|null,
     *   infoURL?: string|null,
     *   ipAddress?: string|null,
     *   location?: string|null,
     *   objectID?: string|null,
     *   regionCode?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
