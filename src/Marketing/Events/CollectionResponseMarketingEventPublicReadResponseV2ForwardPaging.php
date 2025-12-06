<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseMarketingEventPublicReadResponseV2ForwardPagingShape = array{
 *   results: list<MarketingEventPublicReadResponseV2>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseMarketingEventPublicReadResponseV2ForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseMarketingEventPublicReadResponseV2ForwardPagingShape>
     */
    use SdkModel;

    /** @var list<MarketingEventPublicReadResponseV2> $results */
    #[Api(list: MarketingEventPublicReadResponseV2::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseMarketingEventPublicReadResponseV2ForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseMarketingEventPublicReadResponseV2ForwardPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseMarketingEventPublicReadResponseV2ForwardPaging)
     *   ->withResults(...)
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
     * @param list<MarketingEventPublicReadResponseV2|array{
     *   createdAt: \DateTimeInterface,
     *   customProperties: list<CrmPropertyWrapper>,
     *   eventName: string,
     *   objectId: string,
     *   updatedAt: \DateTimeInterface,
     *   appInfo?: AppInfo|null,
     *   attendees?: int|null,
     *   cancellations?: int|null,
     *   endDateTime?: \DateTimeInterface|null,
     *   eventCancelled?: bool|null,
     *   eventCompleted?: bool|null,
     *   eventDescription?: string|null,
     *   eventOrganizer?: string|null,
     *   eventStatus?: string|null,
     *   eventType?: string|null,
     *   eventUrl?: string|null,
     *   externalEventId?: string|null,
     *   noShows?: int|null,
     *   registrants?: int|null,
     *   startDateTime?: \DateTimeInterface|null,
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
     * @param list<MarketingEventPublicReadResponseV2|array{
     *   createdAt: \DateTimeInterface,
     *   customProperties: list<CrmPropertyWrapper>,
     *   eventName: string,
     *   objectId: string,
     *   updatedAt: \DateTimeInterface,
     *   appInfo?: AppInfo|null,
     *   attendees?: int|null,
     *   cancellations?: int|null,
     *   endDateTime?: \DateTimeInterface|null,
     *   eventCancelled?: bool|null,
     *   eventCompleted?: bool|null,
     *   eventDescription?: string|null,
     *   eventOrganizer?: string|null,
     *   eventStatus?: string|null,
     *   eventType?: string|null,
     *   eventUrl?: string|null,
     *   externalEventId?: string|null,
     *   noShows?: int|null,
     *   registrants?: int|null,
     *   startDateTime?: \DateTimeInterface|null,
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
