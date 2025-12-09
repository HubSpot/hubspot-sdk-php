<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
    #[Required(list: MarketingEventPublicReadResponseV2::class)]
    public array $results;

    #[Optional]
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
     *   objectID: string,
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
     *   eventURL?: string|null,
     *   externalEventID?: string|null,
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
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<MarketingEventPublicReadResponseV2|array{
     *   createdAt: \DateTimeInterface,
     *   customProperties: list<CrmPropertyWrapper>,
     *   eventName: string,
     *   objectID: string,
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
     *   eventURL?: string|null,
     *   externalEventID?: string|null,
     *   noShows?: int|null,
     *   registrants?: int|null,
     *   startDateTime?: \DateTimeInterface|null,
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
